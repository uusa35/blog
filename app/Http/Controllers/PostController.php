<?php

namespace App\Http\Controllers;

use App\Events\PostViewed;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $elements = Post::where(['user_id' => auth()->id()])->simplePaginate(self::TAKE_MIN);
        return view('post.index', compact('elements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $elements = User::whereActive(true)->get();
        return view('post.create', compact('elements'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = validator($request->all(), [
            'user_id' => 'required|exists:users,id',
            'title' => 'required|min:3|max:300',
            'content' => 'required|min:3|max:1000'
        ]);
        if ($validate->fails()) {
            return redirect()->back()->with('error', $validate->errors()->first());
        }
        $fileName = $request->image->store('public/images');
        $element = Post::create($request->except('image', '_token'));
        if ($element) {
            $element->update([
                'image' => str_replace('public/', '', $fileName)
            ]);
        }
        return redirect()->back()->with('success', __('general.post_updated_successfully'));

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $element = Post::whereId($id)->with('user', 'views')->with(['comments' => function ($q) {
            return $q->where(['active' => true])->with('user');
        }])->first();
        event(new PostViewed($element));
        return view('post.show', compact('element'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $element = Post::whereId($id)->first();
        return view('post.edit', compact('element'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = validator($request->all(), [
            'user_id' => 'required|exists:users,id',
            'title' => 'required|min:3|max:300',
            'content' => 'required|min:3|max:1000'
        ]);
        if ($validate->fails()) {
            return redirect()->back()->with('error', $validate->errors()->first());
        }
        $element = Post::whereId($id)->first();
        $element->update($request->except('image', '_token'));
        if ($element) {
            if ($request->hasFile('image')) {
                $fileName = $request->image->store('public/images');
                $element->update([
                    'image' => str_replace('public/', '', $fileName)
                ]);
            }
        }
        return redirect()->back()->with('success', __('general.post_created_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
