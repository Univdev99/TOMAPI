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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // dd(env('DB_CONNECTION'));
        phpinfo();
        // try {
        //     \DB::connection()->getPdo();
        // } catch (\Exception $e) {
        //     die("Could not connect to the database.  Please check your configuration. error:" . $e );
        // }
    }
}
