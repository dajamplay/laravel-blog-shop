<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        //JsonResource::$wrap = 'result';
        Paginator::defaultView('vendor.pagination.bootstrap-4');
    }
}
