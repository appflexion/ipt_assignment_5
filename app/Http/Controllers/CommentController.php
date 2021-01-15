<?php

namespace App\Http\Controllers;
use App\Post;
use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Post $post,Request $request)
    {
       $comment = new Comment($request->only(['content']));
       $comment->author_id=1;
       $post->comments()->save($comment);
       return response()->json(['author'=>$comment->author->name,'content'=>$comment->content]);
    }
}
