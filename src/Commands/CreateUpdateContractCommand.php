<?php

namespace Generators\Commands;

use Generators\Abstracts\BaseContractCommand;

class CreateUpdateContractCommand extends BaseContractCommand
{
    protected $signature = 'generators:create-update-contract
        {name : Class name}
        {model? : owner model}
        {--force : recreate class}
    ';

    protected function getStub()
    {
        return __DIR__ . '/../stubs/update-contract-command.stub';
    }
}