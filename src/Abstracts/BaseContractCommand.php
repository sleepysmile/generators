<?php

namespace Generators\Abstracts;

abstract class BaseContractCommand extends BaseGeneratorCommand
{
    protected function buildClass($name)
    {
        $stub = $this->files->get($this->getStub());

        return $this->replaceNamespace($stub, $name)
            ->replaceProperty($stub)
            ->replaceDocblock($stub)
            ->replaceRules($stub)
            ->replaceFilters($stub)
            ->replaceClass($stub, $name);
    }

    protected function getNameInput()
    {
        return 'Create' . parent::getNameInput() . 'Command';
    }

    protected function replaceRules(&$stub): self
    {
        $stub = str_replace(
            '{{rules}}',
            '[]',
            $stub
        );

        return $this;
    }

    protected function replaceFilters(&$stub): self
    {
        $stub = str_replace(
            '{{filters}}',
            '[]',
            $stub
        );

        return $this;
    }

}