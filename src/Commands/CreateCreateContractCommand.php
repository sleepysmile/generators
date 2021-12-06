<?php

namespace Generators\Commands;

use Generators\Abstracts\BaseContractCommand;

class CreateCreateContractCommand extends BaseContractCommand
{
    protected $signature = 'generators:create-create-contract
        {name : Class name}
        {model? : owner model}
        {--force : recreate class}
    ';

    /**
     * @inheritDoc
     *
     * @return string
     */
    protected function getNameInput()
    {
        return 'Create' . parent::getNameInput() . 'Command';
    }

    /**
     * @inheritDoc
     */
    protected function getStub()
    {
        return __DIR__ . '/../stubs/create-contract-command.stub';
    }

}