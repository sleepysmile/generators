<?php

namespace Tests;

class DeleteCommandTest extends TestCase
{
    public function test_create_empty_command()
    {
        $this->artisan('', [
            'name' => 'User',
            'commandClass' => 'App\\UpdateUserCommand',
        ]);

        $this->assertFileExists(app_path() . '/CreateUserCommand.php');
    }

    public function test_crate_by_model_command()
    {
        $this->artisan('', [
            'name' => 'User',
            'model' => 'Tests\\Models\\Users',
            'commandClass' => 'App\\UpdateUserCommand',
            '--force' => true
        ]);

        $this->assertFileExists(app_path() . '/CreateUserCommand.php');
    }
}