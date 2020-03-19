<?php

namespace App\Http\Controllers;

use App\Notifications\RepliedToThread;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    public function addThreadComment(Request $request, Thread $thread)
    {
//        $comment=new Comment();
//        $comment->body=$request->body;
//        $comment->user_id=auth()->user()->id;
//
//        $thread->comments()->save($comment);
        $thread->addComment($request->body);
        $thread->user->notify(new RepliedToThread($thread));
        var_dump($thread);die;
    }
}
