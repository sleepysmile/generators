<?php

namespace Generators\Abstracts;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Contracts\Filesystem\FileNotFoundException;

abstract class BaseGeneratorCommand extends GeneratorCommand
{
//    protected function getModelColumn()
//    {
//        $modelInstance = $this->getModelInstance();
//        $database = null;
//        if (strpos($table, '.')) {
//            [$database, $table] = explode('.', $table);
//        }
//
//        return ($modelInstance === null)
//            ? []
//            : $modelInstance
//                ->getConnection()
//                ->getDoctrineSchemaManager()
//                ->listTableColumns($this->getModelTable());
//    }

//    protected function getModelTable()
//    {
//        $modelInstance = $this->getModelInstance();
//
//        return ($modelInstance === null)
//            ? ''
//            : $modelInstance
//                ->getConnection()
//                ->getTablePrefix()
//            . $modelInstance
//                ->getTable();
//    }

//    protected function getModelInstance(): ?Model
//    {
//        $modelName = $this->argument('model');
//
//        if ($modelName === null) {
//            return null;
//        }
//
//        return (new $modelName);
//    }

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

    protected function replaceProperty(&$stub): self
    {
        $stub = str_replace(
            '{{property}}',
            '',
            $stub
        );

        return $this;
    }

    protected function replaceDocblock(&$stub): self
    {
        $stub = str_replace(
            '{{docblock}}',
            '',
            $stub
        );

        return $this;
    }

}