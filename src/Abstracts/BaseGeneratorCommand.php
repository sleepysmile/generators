<?php

namespace Generators\Abstracts;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Database\Eloquent\Model;

abstract class BaseGeneratorCommand extends GeneratorCommand
{
    protected function alreadyExists($rawName)
    {
        if ($this->options('force')) {
            return false;
        }

        return parent::alreadyExists($rawName);
    }

    /**
     * @param string $name
     * @return string
     * @throws FileNotFoundException
     */
    protected function buildClass($name)
    {
        $stub = $this->files->get($this->getStub());

        return $this->replaceNamespace($stub, $name)
            ->replaceProperty($stub)
            ->replaceDocblock($stub)
            ->replaceClass($stub, $name);
    }

    protected function replaceProperty(&$stub, array $properties = []): self
    {
        $isEmpty = ($properties === []);

        $replace = '';

        if (!$isEmpty) {
            $lastKey = array_key_last($properties);
            foreach ($properties as $name => $property) {
                $replace .= "\tprotected \$$name;" . PHP_EOL;
                // TODO add type caster
                if ($lastKey !== $name) {
                    $replace .=  PHP_EOL;
                }
            }
        }

        $stub = str_replace(
            '{{property}}',
            $replace,
            $stub
        );

        return $this;
    }

    protected function replaceDocblock(&$stub, array $properties = []): self
    {
        $isEmpty = ($properties === []);

        $replace = '';

        if (!$isEmpty) {
            $lastKey = array_key_last($properties);
            foreach ($properties as $name => $property) {
                $replace .= " * @property \$$name";
                // TODO add type caster
                if ($lastKey !== $name) {
                    $replace .= PHP_EOL;
                }
            }
        }

        $stub = str_replace(
            '{{docblock}}',
            $replace,
            $stub
        );

        return $this;
    }

    public function getProperty()
    {
        $modelName = $this->argument('model');

        if ($modelName === null) {
            return [];
        }

        /** @var Model $instanceModel */
        $instanceModel = new $modelName();
        $tableName = $instanceModel->getConnection()->getTablePrefix()
            . $instanceModel->getTable();
        $schema = $instanceModel->getConnection()->getDoctrineSchemaManager();

        $database = null;
        if (strpos($tableName, '.')) {
            [$database, $tableName] = explode('.', $tableName);
        }

        $columns = $schema->listTableColumns($tableName, $database);

        return $columns;
    }

}