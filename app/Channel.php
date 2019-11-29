<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Thread;
use App\Channel;

class Channel extends Model
{
    public function getRouteKeyName() {
        
        return 'slug';
    }
    
    public function threads(){
        
        return $this->hasMany(Thread::class);
    }
}
