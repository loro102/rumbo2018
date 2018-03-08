<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProgramaTest extends TestCase
{
    /** @test */
    public function somebody_can_browse_program()
    {
        $response = $this->get('/');

        $response
            ->assertStatus(200)
            ->assertSee('Laravel');


    }
}
