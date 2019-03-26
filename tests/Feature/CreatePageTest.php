<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use StartPage\Page;
use Illuminate\Foundation\Auth\User;

class CreatePageTest extends TestCase
{
    use RefreshDatabase;

    public function test_an_authenticated_user_may_create_a_page()
    {
        // Given a user
        $user = factory(User::class)->create();

        // And the user has signed in
        $this->actingAs($user);

        // When the user creates a page
        $response = $this->json('POST', '/pages', [
            'user_id' => auth()->id(),
            'name' => 'My first page',
            'theme' => 'cool'
        ]);

        // Assert new page is created
        $response->assertRedirect('pages');
    }

    /** @test */
    public function test_an_unauthenticated_user_may_not_create_a_page()
    {
        // When creating a page as an unauthenticated user
        $response = $this->json('POST', '/pages', [
            'user_id' => auth()->id(),
            'name' => 'My first page',
            'theme' => 'cool'
        ]);

        // Assert user is redirected to login
        $response->assertStatus(401);
    }

    /** @test */
    public function test_an_unauthenticated_user_is_redirected()
    {
        $this->get('/pages/create')
            ->assertRedirect('login');
    }

    /** @test */
    public function test_a_user_may_delete_their_own_page()
    {
        $this->withoutExceptionHandling();
        // Given a user
        $user = factory(User::class)->create();

        // And the user has signed in
        $this->actingAs($user);

        // And the user has a page
        $page = factory(Page::class)->create(['user_id' => auth()->id()]);

        // When hitting the delete endpoint
        $response = $this->json('GET', "/pages/delete/{$page->slug}");

        // Assert the page was deleted
        $response->assertStatus(204);
        $this->assertDatabaseMissing('pages', ['slug' => $page->slug]);
    }

    /** @test */
    public function test_a_user_may_not_delet_other_users_pages()
    {
        
    }
}
