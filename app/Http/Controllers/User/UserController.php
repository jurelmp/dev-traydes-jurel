<?php

namespace Traydes\Http\Controllers\User;

use Traydes\Post;
use Traydes\User;
use Traydes\UserProfile;

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
        $profile = UserProfile::where('user_id', '=', Auth::user()->id)->first();
        $data = null;

        if(empty($profile)) {
            $p = new UserProfile();
            Auth::user()->userProfile()->save($p);
            $profile = $p;
        }

        return view('user.profile', ['profile' => $profile]);
    }

    /**
     * update user profile of authenticated user
     * @param Request $request
     * @return mixed
     */
    public function postProfile(Request $request)
    {
        //$profile = new UserProfile();
//        $profile = Auth::user()->userProfile();

//        if(count($profile) > 0) {
//            $profile->address = $request->get('address');
//            $profile->contact_no = $request->get('contact_no');
//            Auth::user()->userProfile()->save($profile);
//        } else {
//            $p = new UserProfile();
//            $p->address = $request->get('address');
//            $p->contact_no = $request->get('contact_no');
//            Auth::user()->userProfile()->save($p);
//        }

        $profile = UserProfile::where('user_id', '=', Auth::user()->id)->first();
        $profile->first_name = $request->get('first_name');
        $profile->last_name = $request->get('last_name');
        $profile->address = $request->get('address');
        $profile->contact_no = $request->get('contact_no');
        $profile->save();

        return redirect('user/profile')
            ->withSuccess('Changes Saved!');
    }


    /**
     * get all the posts of a user base on the status
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function getMyPosts(Request $request)
    {
        $template = ['user.posts_status._active', 'user.posts_status._trashed'];
        $req = $request->get('status');
        $posts = null;
        $index = 0;

        if ($req === "active") {

        } elseif ($req === "trashed") {
            $posts = Post::onlyTrashed()->where('user_id', Auth::user()->id)->get();
            $index = 1;
            return view('user.myposts', ['posts' => $posts, 'template' => $template[$index]]);
        }

        $posts = Auth::user()->posts;
        return view('user.myposts', ['posts' => $posts, 'template' => $template[$index]]);
    }

    /**
     * restore a specific post
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postRestorePost(Request $request)
    {
        $post = Post::withTrashed()->find($request->get('id'));
        $post->restore();
        return redirect('user/my-posts?status=trashed')
            ->with('success', 'Post Successfully Restored.');
    }

    /**
     * delete a specific post
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postRemovePost(Request $request)
    {
        $post = Post::find($request->get('id'));
        $post->delete();
        return redirect('user/my-posts')
            ->with('success', 'Post Successfully Deleted');
    }

}
