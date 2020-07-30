<?php

// require './upload.php';

$router->get('/', function () use ($router) {
    return $router->app->version();
});

// $router->get('test', function () {
//     dd(app('config'));
// });

$router->group(['middleware' => 'auth'], function ($router) {
    $router->get('test', [
        'as' => 'test',
        'uses' => 'ExampleController@test'
    ]);
    # File文件上传
    $router->post('file/uploading', [
        'as' => 'file.upload',
        function () {
            dd(config('aetherupload'));
        }
    ]);
    // $router->post('file/finish', 'FileController@finishUploading');
    // if ( \AetherUpload\Util::isStorageHost() ) {
    //
    //     $router->post(\AetherUpload\ConfigMapper::get('route_preprocess'), '\AetherUpload\UploadController@preprocess')->middleware(\AetherUpload\ConfigMapper::get('middleware_preprocess'));
    //
    //     $router->options(\AetherUpload\ConfigMapper::get('route_preprocess'), '\AetherUpload\UploadController@options');
    //
    //     $router->post(\AetherUpload\ConfigMapper::get('route_uploading'), '\AetherUpload\UploadController@saveChunk')->middleware(\AetherUpload\ConfigMapper::get('middleware_uploading'));
    //
    //     $router->options(\AetherUpload\ConfigMapper::get('route_uploading'), '\AetherUpload\UploadController@options');
    //
    //     $router->get(\AetherUpload\ConfigMapper::get('route_display').'/{uri}', '\AetherUpload\ResourceController@display')->middleware(\AetherUpload\ConfigMapper::get('middleware_display'));
    //
    //     $router->get(\AetherUpload\ConfigMapper::get('route_download').'/{uri}/{newName}', '\AetherUpload\ResourceController@download')->middleware(\AetherUpload\ConfigMapper::get('middleware_download'));
    // }
});
