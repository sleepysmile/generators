<?php

namespace Generators\Abstracts;

abstract class BaseDeleteCommand extends BaseGeneratorCommand
{
    protected function buildClass($name)
    {
        $stub = $this->files->get($this->getStub());

        return $this->replaceNamespace($stub, $name)
            ->replaceModelclass($stub)
            ->replaceModelinstruction($stub)
            ->replaceClass($stub, $name);
    }

    protected function replaceModelinstruction(&$stub)
    {
        $model = $this->argument('model');
        $replace = '';

        if ($model === null) {
            $stub = str_replace(
                '{{modelinstruction}}',
                '',
                $stub
            );
        }

        $replace .= "\$item->delete();";

        $stub = str_replace(
            '{{modelinstruction}}',
            $replace,
            $stub
        );

        return $this;
    }

    protected function replaceModelclass(&$stub)
    {
        $model = $this->argument('model');
        $replace = '';

        if ($model !== null) {
            $replace .= $model;
        }

        $stub = str_replace(
            '{{modelclass}}',
            $replace,
            $stub
        );

        return $this;
    }
    
}