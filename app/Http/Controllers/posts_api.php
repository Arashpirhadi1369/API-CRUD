<?php

namespace App\Http\Controllers;

use App\Http\Resources\post_resource;
use App\Models\post;
use Illuminate\Http\Request;

class posts_api extends Controller
{
    public function __construct()
    {
        $this->middleware('can:posts-read')->only('index', 'show');
        $this->middleware('can:posts-update')->only('update');
        $this->middleware('can:posts-create')->only('store');
        $this->middleware('can:posts-delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = post_resource::collection(post::all());

        return $posts;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);

        $user = auth()->user();

        $post = new post;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->user_id = $user->id;
        $post->save();

        return $post->id;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = post::findorfail($id);

        return $post;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = auth()->user();

        $post = post::findorfail($id);

        $post->title = $request->title;
        $post->description = $request->description;
        $post->user_id = $user->id;

        $post->save();

        return $post;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = post::findorfail($id);
        $post->delete();

        return $post;
    }
}
