<?php

namespace Tests;

class CreateContractTest extends TestCase
{
    public function test_create_empty_command()
    {
        $this->artisan('generators:create-create-contract', [
            'name' => 'User',
        ]);

        $this->assertFileExists(app_path() . '/CreateUserCommand.php');
    }

    public function test_crate_by_model_command()
    {
        $this->artisan('generators:create-create-contract', [
            'name' => 'User',
            'model' => 'Tests\\Models\\Users',
            '--force' => true
        ]);

        $this->assertFileExists(app_path() . '/CreateUserCommand.php');
    }
}