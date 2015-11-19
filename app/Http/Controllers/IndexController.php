<?php

namespace Traydes\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Traydes\Category;
use Traydes\Post;
use Traydes\Http\Requests\Index\SearchRequest;

use Illuminate\Http\Request;
use Traydes\Http\Requests;
use Traydes\Http\Controllers\Controller;
use Traydes\State;

class IndexController extends Controller
{
    /**
     * get the list of the categories and display to index/home page
     *
     * @return \Illuminate\View\View
     */
    public function getIndex()
    {
        $categories = Category::where('parent_id', 0)->get();
        return view('index.index', ['categories' => $categories]);
    }

    /**
     * get the specific category and display its posts
     *
     * @return \Illuminate\View\View
     */
    public function getView($category_id)
    {
        $cat = Category::find($category_id);
        $child = Category::where('parent_id', $category_id)->get();
        $states = State::all();
        $posts = null;

        if (count($cat->subCategories->toArray()) > 0) {
            //$posts = DB::select('SELECT * FROM posts WHERE category_id IN (SELECT id FROM categories WHERE parent_id = ? ORDER BY published_at DESC)', [$category_id]);
            $cats = Category::where('parent_id', $category_id)->lists('id');
            $posts = Post::whereIn('category_id', $cats)->orderBy('published_at', 'desc')->paginate(config('traydes.posts_per_page'));
        } else {
            //$posts = $cat->posts;
            $posts = Post::where('category_id', $category_id)->orderBy('published_at', 'desc')->paginate(config('traydes.posts_per_page'));
        }
        return view('index.view', ['posts' => $posts, 'child' => $child, 'states' => $states]);
    }

    /**
     * display a single post
     *
     * @param $slug
     * @return \Illuminate\View\View
     */
    public function getPost($slug)
    {
        $post = Post::where('slug', $slug)->first();
        return view('index.post', ['post' => $post]);
    }

    /**
     * search all posts base on the request value
     *
     * @param SearchRequest $request
     * @return \Illuminate\View\View
     */
    public function getSearch(SearchRequest $request)
    {
        $states = State::all();
        $value = $request->get('t');
        /*$posts = Post::where('title', 'LIKE', '%' . $value . '%')
                        ->orWhere('id', $value)
                        ->orWhere('content', 'LIKE', '%' . $value . '%')
                        ->whereNull('deleted_at')->paginate(config('traydes.posts_per_page'));*/

        $posts = Post::where(function($query) use ($value) {
            $query->orWhere('id', $value);
            $query->orWhere('content', 'LIKE', '%' . $value . '%');
        })->whereNull('deleted_at')->paginate(config('traydes.posts_per_page'));

        $count = $posts->total();

        return view('index.view', ['posts' => $posts, 'value' => $value, 'count' => $count, 'states' => $states]);
    }
}
