<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\user\post;
use App\Model\user\tag;
use App\Model\user\catigory;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = post::all();
        return view('admin.post.show',compact('posts'));
    }//end of index

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->can('posts.create')) {
            $tags = tag::all();
            $categories = catigory::all();
            return view ('admin.post.post',compact('tags','categories'));
        }
        return redirect()->route('admin.home');
    }//end of create

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request,[
            'title'=>'required',
            'subtitle'=>'required',
            'slug'=>'required',
            'body'=>'required',
            'image'=>'required',
        ]);
        if($request->hasFile('image')){
            $imagename = $request->image->store('public');
        };
        $post = new post;
        $post->image = $imagename;
        $post-> title = $request->title;
        $post-> subtitle = $request->subtitle;
        $post-> slug = $request->slug;
        $post-> body = $request->body;
        $post-> status = $request->status;
        $post->save();
        $post-> tags()->sync($request->tags);
        $post-> catigories()->sync($request->categories);

        return redirect(route('post.index'));


    }//end of store

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->can('posts.update')){

            $tags = tag::all();
            $categories = catigory::all();
            $post = post::where('id',$id)->first();
            return view('admin.post.edit',compact('post','tags','categories'));
        }
        return redirect()->route('admin.home');

    }//end of edit

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title'=>'required',
            'subtitle'=>'required',
            'slug'=>'required',
            'body'=>'required',
            'image'=>'required',
        ]);

        if($request->hasFile('image')){
            $imagename = $request->image->store('public');
        };

        $post = post::find($id);
        $post->image = $imagename;
        $post-> title = $request->title;
        $post-> subtitle = $request->subtitle;
        $post-> slug = $request->slug;
        $post-> body = $request->body;
        $post-> status = $request->status;
        $post-> tags()->sync($request->tags);
        $post-> catigories()->sync($request->categories);
        $post->save();

        return redirect(route('post.index'));
    }//end of update

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        post::where('id',$id)->delete();
        return redirect()->back();
    }//end of destroy
}//end of post controller
