<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CreateThreadsTest extends TestCase
{
    use DatabaseMigrations;
    
    function test_an_authenticated_user_can_create_new_threads()
    {
        // Given we have a signed in user
//        $this->actingAs(factory('App\User')->create());
        
        // When we hit the endpoint to create a thread
//        $thread = factory('App\Thread')->make();
        
//        $this->post('threads', $thread->toArray());
        
        // Then we visit the threads page
        // We should see the thread
//        $this->get($thread->path())    
//                ->assertSee($thread->title)
//                ->assertSee($thread->body);
    }
}
