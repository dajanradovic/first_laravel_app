<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Blog;
use App\Http\Requests;
use App\Post;
use App\Comment;
use Illuminate\Http\JsonResponse;


class PostsApiController extends Controller
{
    
    public function index()
    {
        $posts=Post::paginate(10);

        if($posts==""){
            return response("No posts");
        }

        return Blog::collection($posts);
    }

    
   
    public function store(Request $request)
    {

        request()->validate([

            'title' => 'required',
            'body' => 'required',
            
            
        ]);

        $post = new Post();
        
        $post->user_id = auth()->user()->id;
        $post->title=$request->input('title');
        $post->body=$request->input('body');
        $post->genre=$request->input('genre');
        

             

        
        if($post->save()){
            return new Blog($post);
        }

        else {

            return response("Something went wrong, please try again");
        }
            }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post=Post::find($id);
   
        if($post==""){
            return response("No such post here");
        }
            
        return new Blog($post);
               return response()->download(public_path('/storage/' . $post->image), 'Cover image');

    }

   
    public function update(Request $request, Post $post)
    {
       //$post=Post::findOrFail($request->id);
       $post->title=$request->input('title');
       $post->body=$request->input('body');
       $post->genre=$request->input('genre');
       $post->save();
    }

   
    public function destroy(Post $post)
    {
     
        $post->delete();
    }

    public function getPostImage($id)
    {
        $post=Post::find($id);
   
        if($post==""){
            return response("No such post here");
        }
            
        return response()->download(public_path('/storage/' . $post->image), 'Cover image');

    }

    public function uploadPostImage(Request $request,Post $post){


       // $fileName="coverPhoto1";
      //  $path = $request->file('image')->move(public_path('storage/' .$fileName));
      //  $photoUrl = url('/'.$fileName);    
       // return response()->json(['url'=>$photoUrl],200 );
        
        $post->update([

            'image'=>$request->file('image')->store('uploads', 'public')
        ]);

        


    }

    public function insertComment(Request $request){
 
        
       
            request()->validate([
    
                'body' => 'required',
                'post_id' => 'required'
                
        ]); 
        
            $comment = new Comment();
         
            $comment->body = $request->input('body');
            $comment->user_id = auth()->user()->id;
            $comment->post_id = $request ->input('post_id');
            $comment->poster_name = $request->input('poster_name');
           
            
            $comment->save();
    
         
            
            





    }

}
