<?php

namespace App\Http\Controllers\User\Comentarios;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\User;
use App\Comentarios;
use App\Escuelas;
use App\PhotosComentarios;

class ComentariosController extends Controller
{
    //

    public function viewreviews()
    {


        $comentarios = Comentarios::with('getPhotosComentario')
            ->where('user_id', '=', Auth::user()->id)
            ->get();

        return view('user.reviews', compact('comentarios'));
    }


    public function storeComentario(Request $request)
    {

        $user =  User::find(Auth::user()->id);

        $comentarios = Comentarios::create([
            'comentario' => $request->review,
            'calification' =>  $request->rating,
            'calificationutil' => 0,
            'escuela_id' =>  $request->escuela_id,
            'user_id' => $user->id,
        ]);


        if ($image = $request->file('image')) {
            foreach ($image as $file) {
                $filename = time() . '-' . $file->getClientOriginalName();
                $filePath = '/images/comentario/' . $filename;

                Storage::disk('s3')->put($filePath, file_get_contents($file));
                PhotosComentarios::create([
                    'photo' => $filename,
                    'comentario_id' =>  $comentarios->id
                ]);
            }
        }


        return redirect()->back();
    }
}
