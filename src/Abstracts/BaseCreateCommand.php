<?php

namespace Generators\Abstracts;

abstract class BaseCreateCommand extends BaseGeneratorCommand
{
    protected function replaceModelnameType(&$stub)
    {
        $stub = str_replace(
            '{{modelnameType}}',
            '',
            $stub
        );

        return $this;
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

    protected function replaceCommandclass(&$stub)
    {
        $command = $this->argument('commandClass');

        if ($command === null) {
            $stub = str_replace(
                '{{commandclass}}',
                '',
                $stub
            );

            return $this;
        }
        // TODO add read contract class
        $stub = str_replace(
            '{{commandclass}}',
            $command,
            $stub
        );

        return $this;
    }

    protected function replaceModelinstruction(&$stub, array $properties)
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

        $replace .= "\t\t\$item = new $model();" . PHP_EOL;

        foreach ($properties as $name => $property) {
            if ($name === 'id') {
                $replace .= "\t\t\$item->$name = $model::nextId();" . PHP_EOL;

                continue;
            }

            $replace .= "\t\t\$item->$name = \$command->$name;" . PHP_EOL;
        }

        $replace .= "\t\t\$item->save();" . PHP_EOL . PHP_EOL;
        $replace .= "\t\treturn \$item;";

        $stub = str_replace(
            '{{modelinstruction}}',
            $replace,
            $stub
        );

        return $this;
    }

}