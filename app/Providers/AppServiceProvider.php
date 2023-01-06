<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $first = DB::table('articles')->select('updated_at');
        $second = DB::table('books')->select('updated_at');
        $third = DB::table('books_contents')->select('updated_at');

        $lastUpdate = DB::table('daily_scraps')->select('updated_at')
            ->union($first)
            ->union($second)
            ->get()->max('updated_at');

        view()->share('lastUpdate', Carbon::parse($lastUpdate)->format('d. m. Y'));
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
