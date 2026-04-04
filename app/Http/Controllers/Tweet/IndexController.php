<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use App\Services\TweetService;
use Illuminate\Http\Request; // TweetServiceのインポート

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, TweetService $tweetService)
    {
        $tweetService = new TweetService; // TweetServiceのインスタンスを作成

        $tweets = $tweetService->getTweets(); // つぶやきの一覧を取得

        return view('tweet.index')
            ->with('tweets', $tweets);
    }
}
