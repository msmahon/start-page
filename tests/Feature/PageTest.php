<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use StartPage\User;
use StartPage\Page;

class PageTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function test_an_authenticated_user_can_create_a_page()
    {
        // User logs in
        $user = factory(User::class)->create();

        // User creates page
        $response = $this->json('POST', 'api/pages/', [
            'user_id' => $user->id,
            'name' => 'My first page',
            'theme' => 'cool'
        ]);
        
        $response->assertStatus(200);

        // Assert new page is created
    }

    public function test_an_authenticated_user_can_view_their_pages()
    {
        // Given we have a user
        $user = factory(User::class)->create();

        // And the user has pages
        $page = factory(Page::class)->create(['user_id' => $user->id]);

        // When the user accesses /my-pages
        // Assert the page name is visible
        $this->actingAs($user)
            ->get('/my-pages')
            ->assertSee($page->name);


    }
}
