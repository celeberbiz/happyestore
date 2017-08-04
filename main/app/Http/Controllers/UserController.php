<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\UserInfo;
use File;
use App\Section;
use App\Cart;
use Session;
use Auth;
use \Illuminate\Database\Eloquent\Collection;
use \Ecommerce\helperFunctions;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin', ['only' => [
            'store',
            'delete',
            'edit'
        ]]);
        $this->middleware('auth', ['only' => [
            'dashboard',
            'editAccount',
            'editInfo'
        ]]);
    }

    public function dashboard()
    {
        $user = Auth::user();
        helperFunctions::getPageInfo($sections,$cart,$total);
        return view('site.dashboard', compact('sections', 'total', 'cart', 'user'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|unique:users',
            'password' => 'required|confirmed',
            'email' => 'required'
        ]);
        $user = User::create([
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'email' => $request->email
        ]);
        $user->isAdmin = $request->isAdmin;
        $user->save();
        UserInfo::create(["user_id" => $user->id, "photo" => "/img/profile.png"]);
        return \Redirect('/admin/users')->with([
            'flash_message' => 'User Successfully Added !'
        ]);
    }


    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return \Redirect('/admin/users')->with([
            'flash_message' => 'User has been Successfully removed',
            'flash-warning' => true
        ]);
    }

    public function edit(Request $request, $id)
    {
        $user = User::find($id);
        $user->isAdmin = $request->isAdmin;
        $user->update([
            'username' => $request->username,
            'email' => $request->email
        ]);

        $user->userInfo()->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'phone' => $request->phone,
            'address' => $request->address,
            'city' => $request->city,
            'zipcode' => $request->zipcode,
            'country' => $request->country
        ]);
        return \Redirect()->back()->with([
            'flash_message' => 'User Successfully Edited'
        ]);
    }

    public function editAccount(Request $request)
    {
        $user = Auth::user();
        $this->validate($request, [
            'photo' => 'image',
            'new_password' => 'confirmed'
        ]);
        if (\Hash::check($request->old_password, $user->password)) {
            Auth::user()->update(['password' => bcrypt($request->new_password)]);
        }
        if ($request->hasFile('photo')) {
            if($user->userInfo->photo !== "/img/profile.png"){
                File::delete(base_path()."/..".$user->userInfo->photo);
            }
            $dest = "content/images/";
            $name = str_random(11)."_".$request->file('photo')->getClientOriginalName();
            $request->file('photo')->move($dest, $name);
            UserInfo::where('user_id', $user->id)->update(['photo' => '/'.$dest.$name]);
        }
        $user->update([
            'email' => $request->email
        ]);
        return \Redirect()->back()->with([
            'flash_message' => 'Successfully saved !'
        ]);
    }

    public function editInfo(Request $request)
    {
        UserInfo::where('user_id', Auth::user()->id)->update($request->except('_token'));
        return \Redirect()->back()->with([
            'flash_message' => 'Successfully saved !'
        ]);
    }
}
