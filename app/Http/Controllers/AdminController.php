<?php

namespace Traydes\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Traydes\Http\Requests\Admin\NewUserRequest;
use Traydes\Http\Requests\Admin\NewCategoryRequest;

use Illuminate\Http\Request;
use Traydes\Http\Requests;
use Traydes\Http\Controllers\Controller;
use Traydes\User;
use Traydes\Category;

class AdminController extends Controller
{
    /**
     * display admin home page
     *
     * @return \Illuminate\View\View
     */
    public function getIndex(Request $request)
    {
        return redirect('admin/dashboard');
    }

    /**
     * get the admin dashboard
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getDashboard()
    {
        return view('admin.index');
    }

    /**
     * get the user page with users data
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getUsers(Request $request)
    {
        $users = User::all();
        return view('admin.users.index', ['users' => $users]);
    }

    /**
     * display the form to create or add a user account
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getUserCreate()
    {
        return view('admin.user.create');
    }

    /**
     * save the user account into the database
     * @param NewUserRequest $request
     * @return mixed
     */
    public function postUserCreate(NewUserRequest $request)
    {
        $user = new User();
        $user->username = $request->get('username');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        $user->save();

        return redirect('admin/user/' . $user->id)->withSuccess('Account created.');
    }

    /**
     * display the user information of the given id
     * @param $id
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|\Symfony\Component\HttpFoundation\Response
     */
    public function getUser($id)
    {
        $user = User::find($id);

        if ($user == null) {
            return response('User Not Found', 404);
        }

        $profile = $user->userProfile;
        $posts = array(
            'all' => $user->posts()->withTrashed()->get()->count(),
            'active' => $user->posts->count(),
            'deleted' => $user->posts()->onlyTrashed()->get()->count(),
        );

        return view('admin.user.index', ['user' => $user, 'profile' => $profile, 'posts' => (object)$posts]);
    }

    public function getCategories(Request $request)
    {
        $req = $request->get('id');
        $categories = null;
        $current = null;

        if ($req == null) {
            $categories = Category::where('parent_id', 0)->get();
        } else {
            $category = Category::find($req);
            $current = $category;
            $categories = $category->subCategories()->get();
        }

        return view('admin.category.index', ['categories' => $categories, 'current' => $current]);
    }

    public function postCategoryCreate(NewCategoryRequest $request)
    {
        $category = new Category();
        $category->parent_id = $request->get('parent_id');
        $category->name = $request->get('name');
        $category->description = $request->get('description');
        $result = $category->save();

        /*return redirect('admin/categories/' . $category->id)->withSuccess('Category created.');*/
        return 'success';
    }


}
