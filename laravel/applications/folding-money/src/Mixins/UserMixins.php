<?php

namespace FoldingMoney\Mixins;

class UserMixins {
    public function test() {
        return fn ($value) => 'INVOICE-'.$value;
    }
}
