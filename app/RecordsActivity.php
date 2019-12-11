<?php


namespace App;

use Illuminate\Database\Eloquent\Model;



trait RecordsActivity {
    
    protected static function bootRecordsActivity(){
        
        if (auth()->guest()) return;
        
        static::created(function($thread) {

            $thread->recordActivity('created');
            
        });
        
        static::deleting(function($model) {
            
            $model->activity()->delete();
            
        });
        
    }
    
    public function activity(){
        
        return $this->morphMany('App\Activity', 'subject');
        
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
