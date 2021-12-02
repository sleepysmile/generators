<?php

namespace Tests;

class CreateCommandTest extends TestCase
{
    public function test_crate_file()
    {
        $this->artisan('generators:create-command', [
            'name' => 'User'
        ]);

        $this->assertTrue(true);
    }
}