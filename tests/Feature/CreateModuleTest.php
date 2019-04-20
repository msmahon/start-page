<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use StartPage\Page;
use Illuminate\Foundation\Auth\User;

class CreateModuleTest extends TestCase
{
    use RefreshDatabase;

    public function a_user_may_add_a_module_to_a_page()
    {
        // Given we have a signed in user
        $user = factory(User::class)->create();
        $this->actingAs($user);

        // And that user has a page
        $page = factory(Page::class)->create(['user_id' => auth()->id()]);

        // When a user creates a new module
        $page = factory(Page::class)->create(['user_id' => auth()->id()]);

        // Assert page has module

    }

}



