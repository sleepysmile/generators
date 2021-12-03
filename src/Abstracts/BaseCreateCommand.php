<?php

namespace Generators\Abstracts;

abstract class BaseCreateCommand extends BaseGeneratorCommand
{
    protected function getNameInput()
    {
        return 'Create' . parent::getNameInput();
    }

    protected function replaceModelnameType(&$stub)
    {
        $stub = str_replace(
            '{{modelnameType}}',
            '',
            $stub
        );

        return $this;
    }

    protected function replaceCommandclass(&$stub)
    {
        $stub = str_replace(
            '{{commandclass}}',
            '',
            $stub
        );

        return $this;
    }

    protected function replaceModelname(&$stub)
    {
        $stub = str_replace(
            '{{modelname}}',
            '',
            $stub
        );

        return $this;
    }

}