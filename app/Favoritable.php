<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Description of Favoritable
 *
 * @author GunaSeelan
 */
trait Favoritable {
    
    public function favorites(){
        
      return  $this->morphMany(Favorite::class, 'favorited');
        
    }
    
    public function favorite(){
        
        $attributes = ['user_id' => auth()->id()]; 
        
        if(! $this->favorites()->where($attributes)->exists()){
            
            return $this->favorites()->create($attributes);
        }
    }
    
    public function isFavorited(){
        
        return !! $this->favorites->where('user_id', auth()->id())->count();
    }
    
    public function getFavoritesCountAttribute(){
        
        return $this->favorites->count();
    }
}
