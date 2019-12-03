<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\User;

class CommentsController extends Controller
{
    public function store(Request $request)
    {
        
       
        request()->validate([

            'body' => 'required'
            
    ]);
        $comment= new Comment();
     
        $comment->body = request('body');
        $comment->user_id = auth()->user()->id;
        $comment->post_id = request('post_id');
        $comment->poster_name = auth()->user()->name;
        $comment->save();

         return redirect ('/home');
       
        }
}
