<?php

namespace Generators\Commands;

use Generators\Abstracts\BaseCreateCommand;

class CreateUpdateCommand extends BaseCreateCommand
{

    protected function getStub()
    {
        return __DIR__ . '/../stubs/update-command.stub';
    }
}