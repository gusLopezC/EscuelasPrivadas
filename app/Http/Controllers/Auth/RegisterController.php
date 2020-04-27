<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use SEO;

use App\User;

use Redirect;
use Session;



class RegisterController extends Controller
{
    //

    /**use Illuminate\Auth\Events\Registered;
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        SEO::setTitle('SCHOOLA | Register');
        SEO::setDescription('Consulta información sobre las características de las escuelas de México. Datos de contacto, información sobre desempeño, infraestructura, programas de apoyo y conoce las opiniones de otros padres de familia.');


        return view('auth.register');
    }

    public function register(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();


        $check = $this->create($data);
        return redirect("user/profile")->withSuccess('Great! You have Successfully loggedin');
    }

    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
        'img' => 'avatar.png',
        'biografy' => null,
        'telephone' => null,
        'role' => 'USER_ROLE',
        'verified' => false,
        'verification_token' => User::generarToken()

      ]);
    }



}

