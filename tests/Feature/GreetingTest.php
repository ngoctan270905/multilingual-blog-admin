<?php

namespace Tests\Feature;

use Tests\TestCase;

class GreetingTest extends TestCase
{
    /** @test */
    public function it_returns_vietnamese_greeting_when_locale_is_vi()
    {
        config(['app.locale' => 'vi']);

        $response = $this->get('/greeting');

        // In ra nội dung response để debug
        dump($response->getContent());

        $response->assertStatus(200);
        $response->assertSee('Xin chào, quản trị viên');
    }

    /** @test */
    public function it_returns_english_greeting_when_locale_is_en()
    {
        config(['app.locale' => 'en']);

        $response = $this->get('/greeting');

        // In ra nội dung response để debug
        dump($response->getContent());

        $response->assertStatus(200);
        $response->assertSee('Hello, admin');
    }
}
