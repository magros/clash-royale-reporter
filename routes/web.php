<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    $token = env('TOKEN_API_CR');
    $opts = [
        "http" => [
            "header" => "auth:" . $token
        ]
    ];

    $context = stream_context_create($opts);

    $test = file_get_contents("https://api.royaleapi.com/player/8L9L9GL", true, $context);

    return response()->json(json_decode($test));
});
