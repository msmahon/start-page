<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Auth\User;


class PageTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function test_a_page_has_a_creator()
    {
        $page = factory('StartPage\Page')->create();
        $this->assertInstanceOf(User::class, $page->user);
    }
}
