<?php

namespace Generators\Abstracts;

use App\CreateUserCommand;

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