<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;  
use Illuminate\Http\Request;
use App\comment;

class CommentController extends Controller
{
    public function store($post_id)

    {
    	$comment=new comment;
    	$comment->body=request('body');
    	$comment->post_id=$post_id;
    	$comment->user_id=Auth::user()->id;
    	$comment->save();
    	return back();
    }
}
