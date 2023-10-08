<?php

namespace App\Providers;

use App\View\Components\Dashboard\Sidebar;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeComponentServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Blade::components([
            Sidebar::class => 'sidebar'
        ]);
    }
}
