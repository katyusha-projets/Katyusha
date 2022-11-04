<?php

namespace Katyusha\Clients\Reddit;

use Katyusha\Clients\Reddit\DTO\RedditPostDTO;
use Katyusha\Clients\Exceptions\ClientRequestException;
use Katyusha\Clients\Reddit\Enums\SubredditSortingEnum;

trait RedditClientRequests {
    /**
     * @throws ClientRequestException
     */
    public function me(): object {
        return $this->get('me');
    }

    /**
     * @throws ClientRequestException
     */
    public function karma(): object {
        return $this->get('me/karma');
    }

    /**
     * @throws ClientRequestException
     */
    public function newSubreddits(): object {
        return $this->get('subreddits/new');
    }

    /**
     * @throws ClientRequestException
     *
     * @return RedditPostDTO[]
     */
    public function posts(string $subreddit, SubredditSortingEnum $sort): array {
        $request  = $this->get("r/${subreddit}/".$sort->value.'.json');
        $response = [];

        foreach ($request->data->children as $post) {
            $data       = $post->data;
            $response[] = RedditPostDTO::fromArray((array) $data);
        }

        return $response;
    }
}
