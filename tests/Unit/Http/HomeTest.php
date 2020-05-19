<?php

namespace Tests\Unit\Http;

use Tests\TestCase;

class HomeTest extends TestCase
{
    public function testAccessPage()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}