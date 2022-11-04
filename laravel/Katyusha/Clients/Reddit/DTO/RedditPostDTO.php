<?php

namespace Katyusha\Clients\Reddit\DTO;

use Katyusha\Infrastructure\Data\DTO;

class RedditPostDTO extends DTO {
    public function __construct(
        public string $id,
        public string $title,
        public string $author,
        public string $subreddit,
        public string $selftext,
        public string $author_fullname,
        public bool $hidden,
        public int $downs,
        public int $ups,
        public int $score,
        public bool $author_premium,
        public string $thumbnail,
        public bool $edited,
        public bool $is_self,
        public int $created,
        public int $wls,
        public int $num_comments,
        public string $permalink,
        public string $parent_whitelist_status,
        public string $author_flair_type,
        public string $suggested_sort,
        public bool $over_18,
        public bool $locked,
        public float $upvote_ratio,
        public ?string $link_flair_text,
        public ?string $post_hint,
        public ?string $selftext_html,
    ) {
    }
}
