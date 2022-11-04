<?php

namespace Katyusha\Infrastructure\Eloquent;

use Katyusha\Infrastructure\Eloquent\Mixins\BuilderMixins;

class Builder extends \Illuminate\Database\Eloquent\Builder {
    use BuilderMixins;
}
