<?php

namespace Generators\Commands;

use Generators\Abstracts\BaseDeleteCommand;

class CreateDeleteCommand extends BaseDeleteCommand
{
    protected $signature = 'generators:create-delete-command
        {name : Class name}
        {model? : owner model}
        {--force : recreate class}
    ';

    protected function getStub()
    {
        return __DIR__ . '/../stubs/delete-command.stub';
    }
}