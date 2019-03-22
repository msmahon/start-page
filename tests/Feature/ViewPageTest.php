<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Auth\User;
use StartPage\Page;

class ViewPageTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function test_a_user_may_view_their_pages()
    {
        $this->withExceptionHandling();
        // Given we have a user
        $user = factory(User::class)->create();

        // And the user has pages
        $page = factory(Page::class)->create(['user_id' => $user->id]);

        // When the user accesses /my-pages
        // Assert the page name is visible
        $this->actingAs($user)
            ->get('/pages')
            ->assertSee($page->name);
    }
}
