<?php

namespace Traydes\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Traydes\Http\Requests\Admin\NewUserRequest;

use Illuminate\Http\Request;
use Traydes\Http\Requests;
use Traydes\Http\Controllers\Controller;
use Traydes\User;

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

    public function getUserCreate()
    {
        return view('admin.user.create');
    }

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
     * different admin actions for a user account
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|string
     */
    public function getUser($id)
    {
        $user = User::find($id);
        return view('admin.user.index', ['user' => $user]);
    }

    public function postUser(Request $request)
    {
        return redirect('admin/users')->withSuccess('Account created.');
    }


}
