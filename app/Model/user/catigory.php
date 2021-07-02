<?php

namespace App\Model\user;

use Illuminate\Database\Eloquent\Model;

class catigory extends Model
{
    public function posts()
    {   
        return $this->belongsToMany('App\Model\user\post','catigory_posts')->OrderBy('created_at','DESC')->paginate(5);
    }//end of posts function

    public function getRouteKeyName(){
        return 'slug';
    }//end of getRouteKeyName
    
}//end of tag model
