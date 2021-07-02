<?php

namespace App\Http\Controllers\User;
use App\Model\user\post;
use App\Model\user\tag;
use App\Model\user\catigory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $posts = post::where('status',1)->OrderBy('created_at','DESC')->paginate(5);
        return view ('user.blog',compact('posts'));
    }// end of index
    
    public function tag(tag $tag){

        $posts= $tag->posts();
        return view ('user.blog',compact('posts'));
     
        
    }// end of tag

    public function category(catigory $category){

        $posts= $category->posts();
        return view ('user.blog',compact('posts'));
         
    }// end of category
    
}//end of controller
