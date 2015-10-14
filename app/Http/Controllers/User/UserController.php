<?php

namespace Traydes\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Traydes\Http\Requests;
use Traydes\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * @return string
     */
    public function getIndex()
    {
        return "TEST";
    }

    /**
     * @return \Illuminate\View\View
     */
    public function getAccountSettings()
    {
        $user = Auth::user();
        return view('user.settings')
            ->with('user', $user);
    }

    /**
     * function change account details
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function postAccountSettings(Requests\User\UpdateAccountRequest $request)
    {
        $auth_pass = Auth::user()->password;
        $old = $request->get('old_password');
        $new = $request->get('new_password');

        if(!Hash::check($old, $auth_pass)) {
            return redirect()
                ->back()
                ->withErrors('Incorrect Current Password');
        }

        Auth::user()->password = Hash::make($new);
        Auth::user()->save();

        return redirect('user/account-settings')
            ->withSuccess('Changes Saved!');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function getProfile()
    {
        return view('user.profile');
    }

}
