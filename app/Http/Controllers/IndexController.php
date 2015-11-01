<?php

namespace Traydes\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Traydes\Category;

use Illuminate\Http\Request;
use Traydes\Http\Requests;
use Traydes\Http\Controllers\Controller;

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
        $posts = null;
        if ($cat->isRoot()) {
            $posts = DB::select('SELECT * FROM posts WHERE category_id IN (SELECT id FROM categories WHERE parent_id = ?)', [$category_id]);
        } else {
            $posts = $cat->posts;
        }
        return view('index.view', ['posts' => $posts]);
    }
}
