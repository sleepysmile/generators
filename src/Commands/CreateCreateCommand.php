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

    /**
     * @inheritDoc
     */
    protected function getStub()
    {
        return __DIR__ . '/../stubs/create-command.stub';
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