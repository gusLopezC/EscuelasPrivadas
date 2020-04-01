<?php

namespace App\Http\Controllers\User\Favoritos;

use Illuminate\Support\Facades\Auth;
use App\Escuelas;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FavoritosController extends Controller
{
    //

    public function viewFavoritos()
    {
        $user = Auth::user();
        $user->favorite(Escuelas::class);

        return $user;
        return view('user.bookmarks');
    }

    public function addFavoritos($id)
    {

        $escuela = Escuelas::find($id);

        $escuela->addFavorite(); //


        return $escuela;
    }
}
