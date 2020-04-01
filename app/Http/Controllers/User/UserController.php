<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;
use Illuminate\Support\Facades\Auth;
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
