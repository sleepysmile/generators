<?php

namespace Generators\Providers;

use Generators\Commands\CreateCreateCommand;
use Generators\Commands\CreateDeleteCommand;
use Generators\Commands\CreateUpdateCommand;
use Generators\Commands\CreateUpdateContractCommand;
use Illuminate\Support\ServiceProvider;
use Generators\Commands\CreateCreateContractCommand;

class GeneratorServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->commands([
            CreateCreateContractCommand::class,
            CreateUpdateContractCommand::class,
            CreateCreateCommand::class,
            CreateUpdateCommand::class,
            CreateDeleteCommand::class
        ]);
    }
}