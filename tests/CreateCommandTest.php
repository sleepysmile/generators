<?php

namespace Tests;

class CreateCommandTest extends TestCase
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

    public function test_add_property_command()
    {
        $this->artisan('generators:create-create-contract', [
            'name' => 'User',
            'model' => 'Tests\\Models\\Users',
            '--force' => true,
            '--update' => true
        ])
            ->expectsQuestion('input property', 'first_name')
            ->expectsQuestion('property type', 'string')
            ->expectsQuestion('property rule', 'required|string|min:1|max:1024')
            ->expectsQuestion('property filter', 'trim|strip_tags');
    }
}