<?php


namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Activity;


trait RecordsActivity {
    
    protected static function bootRecordsActivity(){
        
        static::created(function($thread) {

            $thread->recordActivity('created');
            
        });
        
    }
    
    public function activity(){
        
        return $this->morphMany('App/Activity', 'subject');
        
    }


    protected function recordActivity($event) {

        $this->activity()->create([
            'user_id' => auth()->id(),
            'type' => $this->getActivityEvent($event),
           ]);
    }
    
    protected function getActivityEvent($event){
       
//        $type = strtolower(new \ReflectionClass($this))->getShortName();
      $type =  strtolower(class_basename($this));
     return $event . '_' . $type; 
     
    }
}
