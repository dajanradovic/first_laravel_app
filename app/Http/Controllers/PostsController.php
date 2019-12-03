<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use App\User;
use Image\Intervention\Facades\Image;
use Illuminate\Support\Facades\File;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $user_id = auth()->user()->id;
            $user=User::find($user_id);
           // $posts=$user->posts->paginate(10);
            $posts = Post::where('user_id', $user_id)->paginate(10); 
          

        return view ('dashboard', compact('posts', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

       


        //dd($genres);

      return view ('posts/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       
        request()->validate([

            'title' => 'required',
            'body' => 'required',
            'genre' => 'required',
            'image' => 'required | file | image |max: 3000'
        ]);
        $post= new Post();
        $post->title = request('title');
        $post->body = request('body');
        $post->user_id = auth()->user()->id;
        $post->genre = request('genre');
        $post->image = request('image');
        $post->save();
        
        

        $this->storeImage($post);

            return redirect ('/posts')->with('postsubmitted', 'You have successfully submitted a new post!');

        }

       
        

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $user_id = auth()->user()->id;
        $user=User::find($user_id);
        $post=Post::find($id);
        $comments=Comment::all();

        return view ('posts.show', compact('post','user', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=Post::find($id);
        
        
        return view ('posts.edit')->with ('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post=Post::find($id);
        request()->validate([

            'title' => 'required',
            'body' => 'required',
            'genre' => 'required',
            'image' => 'required | file | image |max: 3000'
        ]);
        $post->title = request('title');
        $post->body = request('body');
        $post->user_id = auth()->user()->id;
        $post->genre = request('genre');
        $post->image = request('image');
        $post->update();

       
        $this->storeImage($post);

            return redirect ('/posts/' . $post->id)->with('postedited', 'You have successfully edited your post');

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::find($id);
       File::delete(public_path('storage/' . $post->image));
        $post->delete();
        

        return redirect ('/posts')->with('postdeleted', 'You have deleted your post');
    }

    private function storeImage($post){

        $post->update([

            'image'=>request()->image->store('uploads', 'public')
        ]);

       

    }
}
