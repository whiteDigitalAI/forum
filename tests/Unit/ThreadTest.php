<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ThreadTest extends TestCase
{
    use DatabaseMigrations;
    
  function test_a_thread_has_a_creator()
    {
        $thread = factory('App\Thread')->create();
        
        $this->assertInstanceOf('App\User', $thread->creator);
    }
    
    /** @test */
    
  function a_thread_belongs_to_a_channel(){
      
      $thread = create('App\Thread');
      
      $this->assertInstanceOf('App\Channel', $thread->channel());
  }
    
}
