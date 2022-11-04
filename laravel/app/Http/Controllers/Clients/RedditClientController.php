<?php

namespace App\Http\Controllers\Clients;

use Katyusha\Clients\Reddit\RedditAPI;
use App\Http\Controllers\ApiController;

class RedditClientController extends ApiController {
    public function dev() {
        $api = new RedditAPI('Cute_Bunny_Berkska', 'Lolita-22416**');
        dd($api->aboutSubreddit('wtf'));

        return 123;
    }

    public function about() {
        return view('client.reddit.about');
    }
}
