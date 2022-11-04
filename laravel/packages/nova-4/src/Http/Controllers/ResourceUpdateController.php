<?php

namespace Laravel\Nova\Http\Controllers;

use Throwable;
use Laravel\Nova\URL;
use Laravel\Nova\Nova;
use Laravel\Nova\Util;
use Illuminate\Support\Carbon;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Laravel\Nova\Actions\ActionEvent;
use Laravel\Nova\Http\Requests\UpdateResourceRequest;
use Laravel\Nova\Exceptions\ResourceSaveCancelledException;

class ResourceUpdateController extends Controller {
    /**
     * The action event for the action.
     */
    protected ?\Laravel\Nova\Actions\ActionEvent $actionEvent;

    /**
     * Create a new resource.
     *
     * @throws \Illuminate\Http\Exceptions\HttpResponseException
     */
    public function __invoke(UpdateResourceRequest $request): \Illuminate\Http\JsonResponse {
        $model = $request->findModelQuery()->lockForUpdate()->firstOrFail();

        try {
            [$model, $resource] = DB::connection($model->getConnectionName())->transaction(function () use ($request, $model) {
                $resource = $request->newResourceWith($model);
                $resource->authorizeToUpdate($request);
                $resource::validateForUpdate($request, $resource);

                if ($this->modelHasBeenUpdatedSinceRetrieval($request, $model)) {
                    response('', 409)->throwResponse();
                }

                [$model, $callbacks] = $resource::fillForUpdate($request, $model);

                DB::transaction(function () use ($request, $model) {
                    Nova::usingActionEvent(function (ActionEvent $actionEvent) use ($request, $model) {
                        $this->actionEvent = $actionEvent->forResourceUpdate($request->user(), $model);
                        $this->actionEvent->save();
                    });
                });

                if ($model->save() === false) {
                    throw new ResourceSaveCancelledException();
                }

                collect($callbacks)->each->__invoke();

                $resource::afterUpdate($request, $model);

                return [$model, $resource];
            });

            if (get_class($model) === Util::userModel() && $model->is($request->user())) {
                $request->user()->refresh();
            }

            return response()->json([
                'id'       => $model->getKey(),
                'resource' => $model->attributesToArray(),
                'redirect' => URL::make($resource::redirectAfterUpdate($request, $resource)),
            ]);
        } catch (Throwable $e) {
            throw $e;
        }
    }

    /**
     * Determine if the model has been updated since it was retrieved.
     */
    protected function modelHasBeenUpdatedSinceRetrieval(UpdateResourceRequest $request, \Illuminate\Database\Eloquent\Model $model): bool {
        $resource = $request->newResource();

        // Check to see whether Traffic Cop is enabled for this resource...
        if ($resource::trafficCop($request) === false) {
            return false;
        }

        $column = $model->getUpdatedAtColumn();

        if (!$model->{$column}) {
            return false;
        }

        return $request->input('_retrieved_at') && $model->usesTimestamps() && $model->{$column}->gt(
            Carbon::createFromTimestamp($request->input('_retrieved_at'))
        );
    }
}
