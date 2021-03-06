<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Storage;
use Image;
use App\User;

use Hash;
use  Alert;

class UserController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user();

        return view('user.profile', compact('user'));
        //
    }

    public function show($photoId)
    {
        //

    }

    public function update(Request $request)
    {

        $user = Auth::user();
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',

        ]);


        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->telephone = $request->get('telephone');
        $user->biografy = $request->get('biografy');

        $user->password =  $user->password;
        $user->img =  $user->img;
        $user->role =  $user->role;


        $user->save();
        Alert::success('Usuario editado', 'Se ha realizado correctamente');
        return redirect()->route('profile', $user);
    }

    public function changePassword(Request $request)
    {
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error", "Your current password does not matches with the password you provided. Please try again.");
        }

        if (strcmp($request->get('current-password'), $request->get('password')) == 0) {
            //Current password and new password are same
            return redirect()->back()->with("error", "New Password cannot be same as your current password. Please choose a different password.");
        }

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('password'));
        $user->save();

        alert()->success('Contraseña actualizada');
        return redirect()->route('profile');
    }


    public function pictureprofile(Request $request)
    {
        // Handle the user upload of avatar
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalName();

            $filePath = '/images/profile/' . $filename;

            Storage::disk('s3')->put($filePath, file_get_contents($avatar));

            // Image::make($avatar)->resize(300, 300)->save(public_path('/uploads/avatars/' . $filename));

            $user = Auth::user();
            $user->img = $filename;
            $user->save();
        }

        return view('user.profile', array('user' => Auth::user()));
    }


    public function destroy()
    {
        Alert::info('Info Title', 'Info Message');

        return false;
        //
        $user = User::find(Auth::user()->id);
        $user->delete();
        Auth::logout();

        return redirect('/')->with('success', 'User has been deleted');
    }
}
