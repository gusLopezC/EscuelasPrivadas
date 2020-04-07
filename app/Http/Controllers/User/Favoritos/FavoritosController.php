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
        /*
        $misfavoritos = SchoolFavoritos::where('school_favoritos.user_id', '=', $user->id)
            //->with('getEscuela')
            ->join('escuelas', 'escuelas.id', '=', 'school_favoritos.escuela_id')
            //->join('photos_escuelas', 'photos_escuelas.escuela_id', '=', 'school_favoritos.escuela_id')
            ->paginate(5);
        */
        $misfavoritos = \DB::table('school_favoritos')
        ->select('school_favoritos.*','escuelas.name','escuelas.slug','escuelas.address','escuelas.calification','photos_escuelas.photo')
        ->where('school_favoritos.user_id', '=', $user->id)
        ->join('escuelas', 'escuelas.id', '=', 'school_favoritos.escuela_id')
        ->join('photos_escuelas', 'photos_escuelas.escuela_id', '=', 'school_favoritos.escuela_id')
        ->paginate(7);

        // return $misfavoritos;
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

        SchoolFavoritos::destroy($id);


        return redirect()->route('bookmarks');
    }
}
