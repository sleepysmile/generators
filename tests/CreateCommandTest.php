<?php

namespace Tests;

class CreateCommandTest extends TestCase
{
    public function test_create_empty_command()
    {
        $this->artisan('generators:create-create-command', [
            'name' => 'User',
            'commandClass' => 'App\\UpdateUserCommand',
        ]);

        $this->assertFileExists(app_path() . '/CreateUser.php');
    }

    public function test_crate_by_model_command()
    {
        $this->artisan('generators:create-create-command', [
            'name' => 'User',
            'model' => 'Tests\\Models\\Users',
            'commandClass' => 'App\\UpdateUserCommand',
            '--force' => true
        ]);

        $this->assertFileExists(app_path() . '/CreateUser.php');
    }

}