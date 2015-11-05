<?php

namespace Traydes\Http\Controllers;

use Illuminate\Http\Request;
use Traydes\Http\Requests;
use Traydes\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * display admin home page
     *
     * @return \Illuminate\View\View
     */
    public function getIndex(Request $request)
    {
        //return view('admin.index');
        $req = $request->get('manage');

        if ($req == 'users') {
            return "Users";
        } elseif ($req == 'categories') {
            return "Categories";
        } elseif ($req == 'posts') {
            return "Posts";
        } else {
            return abort(404, "Not Found");
        }
    }
}
