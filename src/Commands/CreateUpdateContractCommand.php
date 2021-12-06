<?php

namespace Generators\Commands;

use Generators\Abstracts\BaseContractCommand;
use Generators\Abstracts\BaseCreateCommand;

class CreateUpdateContractCommand extends BaseContractCommand
{
    protected $signature = 'generators:create-update-contract
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
        return 'Update' . parent::getNameInput() . 'Command';
    }

    /**
     * @inheritDoc
     */
    protected function getStub()
    {
        return __DIR__ . '/../stubs/update-contract-command.stub';
    }
}