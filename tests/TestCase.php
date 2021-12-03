<?php

namespace Tests;

use Generators\Providers\GeneratorServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;

abstract class TestCase extends \Orchestra\Testbench\TestCase
{
    use RefreshDatabase;

    protected $consoleOutput;

    protected function getPackageProviders($app)
    {
        return [
            GeneratorServiceProvider::class
        ];
    }

    protected function defineDatabaseMigrations()
    {
        $this->loadLaravelMigrations();
    }

    protected function resolveApplicationConsoleKernel($app)
    {
        $app->singleton('Illuminate\Contracts\Console\Kernel', Kernel::class);
    }

    public function consoleOutput()
    {
        return $this->consoleOutput ?: $this->consoleOutput = $this->app[Kernel::class]->output();
    }

}