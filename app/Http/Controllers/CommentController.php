<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::orderby('id','desc')->simplePaginate(20);
        return view('comment.index', compact('comments'));
    }

    public function store(Request $request)
    {
        $validate = validator($request->all(), [
            'user_id' => 'required|exists:users,id',
            'post_id' => 'required|exists:posts,id',
            'content' => 'required|min:5|max:1000'
        ]);
        if ($validate->fails()) {
            return redirect()->back()->with('error', $validate->errors()->first());
        }
        Comment::create($request->all());
        return redirect()->back()->with('success', __('general.comment_added_successfully'));
    }

    public function edit($id)
    {
        $comment = Comment::whereId($id)->first();
        return view('comment.edit', compact('comment'));
    }

    public function update(Request $request, $id)
    {
        $validate = validator($request->all(), [
            'user_id' => 'required|exists:users,id',
            'post_id' => 'required|exists:posts,id',
            'content' => 'required|min:5|max:1000'
        ]);
        if ($validate->fails()) {
            return redirect()->back()->with('error', $validate->errors()->first());
        }
        $comment = Comment::whereId($id)->first();
        $comment->update($request->all());
        return redirect()->route('post.show', $comment->post_id)->with('success', __('general.comment_updated_successfully'));
    }
}
