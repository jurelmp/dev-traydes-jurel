<?php

namespace Traydes\Http\Controllers\User;

use Traydes\Category;

use Illuminate\Http\Request;
use Traydes\Http\Requests;
use Traydes\Http\Controllers\Controller;
use Traydes\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($cat_id)
    {
        $parent = Category::find($cat_id)->parentCategory()->get();
        $current = Category::find($cat_id);
        $categories = Category::find($cat_id)->subCategories()->get();
        $posts = Category::find($cat_id)->posts()->get();
        return view('user.posts.index', ['posts' => $posts, 'categories' => $categories, 'parent' => $parent, 'current' => $current->toArray()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($cat_id, $id)
    {
        $post = Post::find($id);
        return view('user.posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
