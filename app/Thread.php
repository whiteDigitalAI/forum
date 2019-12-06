<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Channel;

class Thread extends Model
{
    
    protected $guarded = [];
    protected $with = ['creator','channel'];
    
    protected static function boot(){
        
        parent::boot();
        
        static::addGlobalScope('replyCount', function($builder){
            
            $builder->withCount('replies');
        }
            );
            
        
        
    }
    
    public function path(){
        
        return "/threads/{$this->channel->slug}/{$this->id}";
    }
            
        
    public function replies(){
        
        return $this->hasMany(Reply::class)
                ->withCount('favorites')
                ->with('owner');
    }
//    
//    public function getReplyCountAttribute(){
//        
//        return $this->replies()->count();
//    }
    
    public function addReply($reply){
        
       $this->replies()->create($reply); 
        
     }
    
    public function creator(){
        
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function channel(){
        
        return $this->belongsTo(Channel::class);
    }
    
    public function scopeFilter($query, $filters){
        
        return $filters->apply($query);
    }
}
