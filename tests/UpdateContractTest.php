<?php

namespace Tests;

class UpdateContractTest extends TestCase
{
    public function test_create_empty_command()
    {
        $this->artisan('generators:create-update-contract', [
            'name' => 'User',
        ]);

        $this->assertFileExists(app_path() . '/UpdateUserCommand.php');
    }

    public function test_crate_by_model_command()
    {
        $this->artisan('generators:create-update-contract', [
            'name' => 'User',
            'model' => 'Tests\\Models\\Users',
            '--force' => true
        ]);

        $this->assertFileExists(app_path() . '/UpdateUserCommand.php');
    }

}