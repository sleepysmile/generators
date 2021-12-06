<?php

namespace Generators\Commands;

use Generators\Abstracts\BaseCreateCommand;

class CreateCreateCommand extends BaseCreateCommand
{
    protected $signature = 'generators:create-create-command
        {name : Class name}
        {model? : owner model}
        {commandClass? : owner command}
        {--force : recreate class}
    ';

    protected function getNameInput()
    {
        return 'Create' . parent::getNameInput();
    }

    /**
     * @inheritDoc
     */
    protected function getStub()
    {
        return __DIR__ . '/../stubs/create-command.stub';
    }

}