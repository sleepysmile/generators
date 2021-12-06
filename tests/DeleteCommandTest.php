<?php

namespace Tests;

class DeleteCommandTest extends TestCase
{
    public function test_create_empty_command()
    {
        $this->artisan('generators:create-delete-command', [
            'name' => 'User',
        ]);

        $this->assertFileExists(app_path() . '/DeleteUser.php');
    }

    public function test_crate_by_model_command()
    {
        $this->artisan('generators:create-delete-command', [
            'name' => 'User',
            'model' => 'Tests\\Models\\Users',
            '--force' => true
        ]);

        $this->assertFileExists(app_path() . '/DeleteUser.php');
    }
}