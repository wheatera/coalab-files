<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
        // JWT服务
        $this->app->register(\Tymon\JWTAuth\Providers\LumenServiceProvider::class);
        // Image服务
        $this->app->register(\Intervention\Image\ImageServiceProvider::class);
        // File文件分块上传服务
        $this->app->register(\AetherUpload\AetherUploadServiceProvider::class);
        // Route列表服务
        $this->app->register(\Appzcoder\LumenRoutesList\RoutesCommandServiceProvider::class);
    }
}
