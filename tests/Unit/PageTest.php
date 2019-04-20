<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Auth\User;
use StartPage\Page;
use StartPage\Module;


class PageTest extends TestCase
{
    use DatabaseMigrations;


    /** @test */
    public function test_a_page_has_a_module()
    {
        // Given we have a page
        $page = factory(Page::class)->create(['user_id' => 1]);
        
        // And that page has a module
        $module = factory(Module::class)->create(['page_id' => $page->id]);

        // When we retrieve a pages modules
        $pageModule = $page->modules()->first();

        // Assert we see the module
        $this->assertEquals($page->id, $module->page_id);
    }
}
