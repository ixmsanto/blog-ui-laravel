<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'post_id' => 'required|exists:posts,id',
            'content' => 'required|string|max:1000',
        ]);

        $comment = Comment::create([
            'post_id' => $request->post_id,
            'content' => $request->content,
        ]);

        return response()->json([
            'id' => $comment->id,
            'content' => $comment->content,
            'created_at' => $comment->created_at->toDateTimeString(),
        ]);
    }
}
