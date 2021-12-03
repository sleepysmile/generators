<?php

namespace Generators\Commands;

use Generators\Abstracts\BaseContractCommand;

class CreateContractCommand extends BaseContractCommand
{
    protected $signature = 'generators:create-command
        {name : Class name}
        {model? : owner model}
        {--force : recreate class}
    ';

    /**
     * @inheritDoc
     */
    protected function getStub()
    {
        return __DIR__ . '/../stubs/contract-command.stub';
    }

}