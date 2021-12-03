<?php

namespace Generators\Commands;

use Generators\Abstracts\BaseDeleteCommand;

class CreateDeleteCommand extends BaseDeleteCommand
{

    protected function getStub()
    {
        return __DIR__ . '/../stubs/delete-command.stub';
    }
}