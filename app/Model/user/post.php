<?php

namespace App\Model\user;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    public function tags ()
    {
        return $this-> belongsToMany('App\Model\user\tag','post_tags')->withTimestamps();
    }//end of tags function

    public function catigories ()
    {
        return $this-> belongsToMany('App\Model\user\catigory','catigory_posts')->withTimestamps();
    }//end of category function

    public function getRouteKeyName(){
        return 'slug';
    }//end of getRouteKeyName

}//end of post model
