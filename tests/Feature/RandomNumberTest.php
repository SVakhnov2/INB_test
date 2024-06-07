<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RandomNumberTest extends TestCase
{
    use RefreshDatabase;

    public function testGenerate()
    {
        $response = $this->post('/api/generate');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'id',
            'number'
        ]);
    }

    public function testRetrieve()
    {
        $response = $this->post('/api/generate');
        $id = $response->json('id');

        $response = $this->get("/api/retrieve/{$id}");

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'id',
            'number'
        ]);
    }
}
