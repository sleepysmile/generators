<?php

namespace Generators\Abstracts;

use Illuminate\Database\Eloquent\Model;

abstract class BaseContractCommand extends BaseGeneratorCommand
{
    protected function buildClass($name)
    {
        $stub = $this->files->get($this->getStub());
        $properties = $this->getProperty();

        return $this->replaceNamespace($stub, $name)
            ->replaceProperty($stub, $properties)
            ->replaceDocblock($stub, $properties)
            ->replaceRules($stub, $properties)
            ->replaceFilters($stub)
            ->replaceClass($stub, $name);
    }

    protected function replaceRules(&$stub, array $properties): self
    {
        $isEmpty = ($properties === []);

        $replace = '';

        if (!$isEmpty) {
            $replace .= '[' . PHP_EOL;

            foreach ($properties as $name => $property) {
                $replace .= "\t\t\t\"$name\" => \"\"" . ',' . PHP_EOL;
            }

            $replace .= "\t\t]";
        }

        $stub = str_replace(
            '{{rules}}',
            $replace,
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