<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\File;
use App\Services\GlideService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // $this->app->singleton('League\Glide\Server', function ($app) {

        //     $publicPath = public_path();
        //     $sourcePath = $publicPath . '/images';
        //     $cachePath = $publicPath . '/images/.cache';

        //     File::makeDirectory($cachePath, 0755, true, true);

        //     return \League\Glide\ServerFactory::create([
        //         'source' => $sourcePath,
        //         'cache' => $cachePath,
        //         'source_path_prefix' => '',
        //         'cache_path_prefix' => '.cache',
        //     ]);
        // }); 

        $this->app->bind(GlideService::class, function () {
            return new GlideService();
        });
    }



    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

