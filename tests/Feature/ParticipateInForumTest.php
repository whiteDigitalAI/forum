<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ParticipateInForumTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use DatabaseMigrations;
    
    public function test_an_authenticated_user_may_participate_in_forum_threads()
    {
        // Given we have an Authenticated User
        $this->be($user = factory('App\User')->create());
        
        //Add an existing thread
        $thread = factory('App\Thread')->create();
        
        //when the user add replies to thread
        $reply = factory('App\Reply')->create();
        $this->post('/thread/' . $thread->id . '/replies', $reply->toArray());
    }
}
