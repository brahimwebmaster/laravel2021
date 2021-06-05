<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\Category;

use View;

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
     View::share([
          'application_name' => 'APP LIVRE',
          'company_name' => '3w',
          'categories'=> Category::all()
      ]);
      Paginator::useBootstrap();
        //
    }
}
