<?php

namespace App\Providers;
use Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
         Validator::extend('before2', function ($attribute, $value, $parameters, $validator) {
            return $value == 'before2';
        });

          Validator::extend('after2', function ($attribute, $value, $parameters, $validator) {
            return $value == 'after2';
        });
           Validator::extend('year', function ($attribute, $value, $parameters, $validator) {
            return $value == 'year';
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
