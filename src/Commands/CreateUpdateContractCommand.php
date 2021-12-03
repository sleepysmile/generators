<?php

namespace Generators\Commands;

use Generators\Abstracts\BaseContractCommand;

class CreateUpdateContractCommand extends BaseContractCommand
{

    protected function getStub()
    {
        return __DIR__ . '/../stubs/update-contract-command.stub';
    }
}