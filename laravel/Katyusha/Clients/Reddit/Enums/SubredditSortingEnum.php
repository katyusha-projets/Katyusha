<?php

namespace Katyusha\Clients\Reddit\Enums;

enum SubredditSortingEnum: string {
    case HOT     = 'hot';
    case POPULAR = 'popular';
    case NEW     = 'new';
}
