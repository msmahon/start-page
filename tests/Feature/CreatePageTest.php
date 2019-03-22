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

    public function test_an_authenticated_user_can_create_a_page()
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
        $response->assertStatus(201);
    }

    // /** @test */
    // public function guests_may_not_create_pages()
    // {
    //     $this->post('/pages')
    //         ->assertRedirect();
    // }
}
