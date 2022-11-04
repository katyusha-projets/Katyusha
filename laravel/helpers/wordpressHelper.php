<?php

use Features\Instance\ShopInstance;

function getInstance(): ShopInstance {
    return app(ShopInstance::class);
}

function wordpressBaseDir(): string {
    return base_path('wordpress');
}

function wordpressAdminDir(): string {
    return wordpressBaseDir().'/wp-admin';
}

function wordpressIndex(): string {
    return wordpressBaseDir().'/index.php';
}

function wordpressAdminIndex(): string {
    return wordpressAdminDir().'/index.php';
}
