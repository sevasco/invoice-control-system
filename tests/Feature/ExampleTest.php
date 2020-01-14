<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        // Migrar la base de datos, hacer seed
        // Crear un usuario
        // Autenticar el usuario
        $response = $this->get('/customers/create');

        // HTTP Codes
        $response->assertStatus(200);
    }
}
