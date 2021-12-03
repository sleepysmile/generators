<?php

namespace Tests;

class CreateContractTest extends TestCase
{
    public function test_create_empty_command()
    {
        $this->artisan('generators:create-command', [
            'name' => 'User',
        ]);

        $this->assertFileExists(app_path() . '/CreateUserCommand.php');
    }

    public function test_crate_by_model_command()
    {
        $this->artisan('generators:create-command', [
            'name' => 'User',
            'model' => 'Tests\\Models\\Users'
        ]);

        $this->assertFileExists(app_path() . '/CreateUserCommand.php');
    }
}