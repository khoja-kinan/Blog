<?php

namespace App\Model\user;

use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
    public function posts()
    {   
        return $this->belongsToMany('App\Model\user\post','post_tags')->OrderBy('created_at','DESC')->paginate(5);
    }//end of posts function

    public function getRouteKeyName(){
        return 'slug';
    }//end of getRouteKeyName

}//end of tag model
