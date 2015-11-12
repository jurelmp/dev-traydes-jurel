<?php

namespace Traydes\Http\Controllers;

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

    /**
     * different admin actions for a user account
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|string
     */
    public function getUser(Request $request)
    {
        $default = array(
            'id' => '',
            'username' => '',
            'email' => '',
        );

        $action = $request->get('action');

        switch ($action) {
            case 'create':
                $user =  (object)$default;
                return view('admin.user.create', ['user' => $user]);
                break;
            case 'edit':
                return view('admin.user.edit');
                break;
            case 'view':
                return 'view details for the user';
                break;
            default:
                return redirect('admin/users')->withErrors('Action not Found!');
                break;
        }
    }

    public function postSaveUser(Request $request)
    {
        return redirect('admin/users')->withSuccess('Account created.');
    }


}
