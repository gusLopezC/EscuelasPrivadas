<?php

namespace App\Http\Controllers\User\Favoritos;

use Illuminate\Support\Facades\Auth;
use App\Escuelas;
use App\SchoolFavoritos;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FavoritosController extends Controller
{
    //

    public function viewFavoritos()
    {

        $user = Auth::user();

         $misfavoritos = SchoolFavoritos::
            where('user_id', '=', $user->id)
            ->with('escuela')
            ->get();



        return view('user.bookmarks', compact('misfavoritos'));
    }

    public function addFavoritos($id)
    {
        $user = Auth::user();

        $ExisteFavorito = SchoolFavoritos::where('escuela_id', '=', $id)
            ->where('user_id', '=', $user->id)
            ->get();


        if (!count($ExisteFavorito)) {

            SchoolFavoritos::create([
                'escuela_id' => $id,
                'user_id' =>  $user->id
            ]);
        }

        return redirect()->route('bookmarks');
    }

    public function deleteFavoritos($id)
    {

        $Favorito = SchoolFavoritos::find($id);

        $Favorito->delete();

        return redirect()->route('bookmarks');
    }
}
