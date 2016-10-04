<?php

namespace YourFolder\CSV\App\Laravel;

use YOURFOLDER\CSV\Domain\Services\CSVService;
use Illuminate\Support\ServiceProvider;

class CSVServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(CSVService::class, CSVService::class);
    }

    public function provides()
    {
        return [CSVService::class];
    }
}