<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;


class ReadThreadsTest extends TestCase
{
    use DatabaseMigrations;
    
//    protected function setUp(): void
//    {
//        
//        parent::setUp();
//        
//        $this->thread = factory('App\Thread')->create();
//        
//    }
    
    public function test_a_user_can_view_all_threads()
    {
        $thread = factory('App\Thread')->create();
        
        $response = $this->get('/threads')
                    ->assertSee($thread->title);

    }
    
     public function test_a_user_can_read_a_single_thread()
    {
       $thread = factory('App\Thread')->create();
 
        $this->get('/threads/' . $thread->id)
                ->assertSee($thread->title);

    }
    
    public function test_a_user_can_read_replies_associated_with_a_thread()
    {
      
      $thread = factory('App\Thread')->create();
      
      $reply = factory('App\Reply')
              ->create(['thread_id' => $this->thread->id]);
      
      $this.get('/threads/' . $this->thread->id)
              ->assertSee($reply->body);
              
 
     }
}
