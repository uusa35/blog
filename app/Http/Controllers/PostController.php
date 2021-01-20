<?php
namespace App\Http\Controllers;

use App\Events\PostViewed;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where(['user_id' => auth()->id()])->simplePaginate(20);
        return view('post.index', compact('posts'));
    }

    public function create()
    {
        $users = User::all();
        return view('post.create', compact('users'));
    }

    public function store(Request $request)
    {
        $validate = validator($request->all(), [
            'user_id' => 'required|exists:users,id',
            'title' => 'required|min:3|max:300',
            'content' => 'required|min:3|max:10000'
        ]);
        if ($validate->fails()) {
            return redirect()->back()->with('error', $validate->errors()->first());
        }
        $fileName = $request->image->store('public/images');
        $post = Post::create($request->except('image', '_token'));
        if ($post) {
            $post->update([
                'image' => str_replace('public/', '', $fileName)
            ]);
        }
        return redirect()->back()->with('success', __('general.post_created_successfully'));

    }

    public function show($id)
    {
        $post = Post::whereId($id)->with('user', 'views')->with(['comments' => function ($q) {
            return $q->has('user')->with('user');
        }])->first();
        event(new PostViewed($post));
        return view('post.show', compact('post'));
    }

    public function edit($id)
    {
        $post = Post::whereId($id)->first();
        return view('post.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $validate = validator($request->all(), [
            'user_id' => 'required|exists:users,id',
            'title' => 'required|min:3|max:300',
            'content' => 'required|min:3|max:10000'
        ]);
        if ($validate->fails()) {
            return redirect()->back()->with('error', $validate->errors()->first());
        }
        $post = Post::whereId($id)->first();
        $post->update($request->except('image', '_token'));
        if ($post) {
            if ($request->hasFile('image')) {
                $fileName = $request->image->store('public/images');
                $post->update([
                    'image' => str_replace('public/', '', $fileName)
                ]);
            }
        }
        return redirect()->back()->with('success', __('general.post_updated_successfully'));
    }
}
