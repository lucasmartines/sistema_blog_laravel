<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Http\Requests\CommentFormRequest;


class CommentsController extends Controller
{
    //
    public function AddComment(CommentFormRequest $req){
        
        $_user_id = $req->input("user_id");
        $_post_id = $req->input("post_id");
        $_comment = $req->input("comment");

        $comment = new Comment;
        $comment->user_id = $_user_id;
        $comment->comment = $_comment;
        $comment->post_id = $_post_id;
        
        $comment->save();
        return back()->with("status","Comentario adicionado com sucesso!");
    }
}
