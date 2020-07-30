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

/*use Illuminate\Http\Response;
use Intervention\Image\Facades\Image;

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->post('login', 'ExampleController@login');

// $router->get('test', 'ExampleController@test');

$router->group(['middleware' => 'auth'], function ($router) {
    $router->get('test', 'ExampleController@test');
});

$router->get('image', function()
{
    // $img = Image::make(storage_path('app/public/') . 'image.jpg')->resize(300, 200)->insert('watermark.png');
    $img = Image::canvas(800, 600, '#e5310d');
    $response = Response::make($img->encode('png'));
    $response->header('Content-Type', 'image/png');

    return $response;
    // header('Content-Type: image/png');
    // echo $img->response('png', 80);
});*/
