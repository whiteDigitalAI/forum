<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Reply;
use App\Favorite;

class FavoritesController extends Controller
{
    public function __construct(){
        
        $this->middleware('auth');
        
    }
    
    
    public function store(Reply $reply){
        
 //       Favorite::create(
            
//            'user_id' => auth()->id(),
//            'favorited_id' => $reply->id,
//            'favorited_type' => get_class($reply)
            
            $reply->favorite();
            
            return back();
            
       
    }
}
