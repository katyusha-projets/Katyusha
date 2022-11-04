<?php

namespace App\Providers;

use Spark\Plan;
use Spark\Spark;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\ValidationException;

class SparkServiceProvider extends ServiceProvider {
    /**
     * Bootstrap any application services.
     */
    public function boot(): void {
        Spark::billable(User::class)->resolve(fn (Request $request) => $request->user());

        Spark::billable(User::class)->authorize(function (User $billable, Request $request) {
            return $request->user() &&
                   $request->user()->id === $billable->id;
        });

        Spark::billable(User::class)->checkPlanEligibility(function (User $billable, Plan $plan) {
            // if ($billable->projects > 5 && $plan->name == 'Basic') {
            //     throw ValidationException::withMessages([
            //         'plan' => 'You have too many projects for the selected plan.'
            //     ]);
            // }
        });
    }
}
