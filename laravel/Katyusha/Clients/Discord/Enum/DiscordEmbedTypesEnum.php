<?php

namespace Katyusha\Clients\Discord\Enum;

enum DiscordEmbedTypesEnum: string {
    case TYPE_RICH    = 'rich';
    case TYPE_IMAGE   = 'image';
    case TYPE_VIDEO   = 'video';
    case TYPE_GIFV    = 'gifv';
    case TYPE_ARTICLE = 'article';
    case TYPE_LINK    = 'link';
}
