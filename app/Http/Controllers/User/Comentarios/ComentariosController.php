<?php

namespace App\Http\Controllers\User\Comentarios;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Comentarios;

class ComentariosController extends Controller
{
    //

    public function viewreviews(){


        $comentarios = Comentarios::with('getPhotosComentario')
        ->where('user_id','=', Auth::user()->id)
        ->get();

        return view('user.reviews', compact('comentarios'));
    }
}
