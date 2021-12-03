<?php

namespace Generators\Providers;

use Generators\Commands\CreateCreateCommand;
use Illuminate\Support\ServiceProvider;
use Generators\Commands\CreateContractCommand;

class GeneratorServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->commands([
            CreateContractCommand::class,
            CreateCreateCommand::class
        ]);
    }
}