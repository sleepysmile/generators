<?php

namespace Generators\Commands;

use Generators\Abstracts\BaseCreateCommand;

class CreateUpdateCommand extends BaseCreateCommand
{
    protected $signature = 'generators:create-update-command
        {name : Class name}
        {model? : owner model}
        {--force : recreate class}
    ';

    protected function getStub()
    {
        return __DIR__ . '/../stubs/update-command.stub';
    }
}