<?php

namespace Katyusha\Services\Communication\Enum;

enum MessageTypes {
    case NOTIFICATION;
    case SHORT_MESSAGE;
    case CONTENT_MESSAGE;
}
