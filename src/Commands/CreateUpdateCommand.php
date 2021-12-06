<?php

namespace Generators\Commands;

use Generators\Abstracts\BaseCreateCommand;

class CreateUpdateCommand extends CreateCreateCommand
{
    protected $signature = 'generators:create-update-command
        {name : Class name}
        {model? : owner model}
        {commandClass? : owner command}
        {--force : recreate class}
    ';

    protected function getNameInput()
    {
        return 'Update' . parent::getNameInput();
    }

    protected function getStub()
    {
        return __DIR__ . '/../stubs/update-command.stub';
    }

    protected function buildClass($name)
    {
        $stub = $this->files->get($this->getStub());
        $properties = $this->getProperty();

        return $this->replaceNamespace($stub, $name)
            ->replaceCommandclass($stub)
            ->replaceModelnameType($stub)
            ->replaceModelinstruction($stub, $properties)
            ->replaceClass($stub, $name);
    }

}