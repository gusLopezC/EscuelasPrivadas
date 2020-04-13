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

    public function obtenerComentarios($slug)
    {
        $escuela = Escuelas::where('slug', '=', $slug)
            ->with('getPhotos')
            ->with('getUser')
            ->with('getComentarios')
            ->get();

        $escuela = $escuela[0];
        $escuela->services = json_decode($escuela->services, true);
        $escuela->redsocial = json_decode($escuela->redsocial, true);

        $comentarios = Comentarios::
            //where('escuela_id', '=', $request->escuela_id)
            paginate(5);


        return view('school.comentariosschool', compact('escuela'));
    }

    public function viewreviews()
    {


        $comentarios = Comentarios::where('user_id', '=', Auth::user()->id)
            ->with('getEscuela')
            ->with('getPhotosEscuela')
            ->paginate(2);

        // return $comentarios;

        return view('user.reviews.reviews', compact('comentarios'));
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
                $filePath = '/images/comentarios/' . $filename;

                Storage::disk('s3')->put($filePath, file_get_contents($file));
                PhotosComentarios::create([
                    'photo' => $filename,
                    'comentario_id' =>  $comentarios->id
                ]);
            }
        }


        return redirect()->back();
    }

    public function edit($id)
    {


        $comentario = Comentarios::where('id', '=', $id)
            ->with('getPhotosComentario')
            ->get();
        $comentario = $comentario[0];

        // return $comentario;
        return view('user.reviews.editreviews', compact('comentario'));
    }

    public function update(Comentarios $comentario, Request $request)
    {
        $this->validate($request, [
            'comentario' => 'required',
            'calification' => 'required',
        ]);
        $comentario->comentario = $request->get('comentario');
        $comentario->calification = $request->get('calification');
        $comentario->save();

        if ($image = $request->file('image')) {
            foreach ($image as $file) {
                $filename = time() . '-' . $file->getClientOriginalName();
                $filePath = '/images/comentarios/' . $filename;

                Storage::disk('s3')->put($filePath, file_get_contents($file));
                PhotosComentarios::create([
                    'photo' => $filename,
                    'comentario_id' =>  $comentario->id
                ]);
            }
        }

        return redirect()->route('reviews');
    }

    public function comentarioUtil(Comentarios $comentario)
    {

        $comentario->calificationutil =  $comentario->calificationutil + 1;
        $comentario->save();

        return redirect()->back();
    }

    public function destroy($id)
    {


        $photosComentario = PhotosComentarios::where('comentario_id', '=', $id)->get();

        foreach ($photosComentario as $photo) {
            # code...
            if (Storage::disk('s3')->exists('/images/comentarios/' . $photo->photo)) {
                Storage::disk('s3')->delete('/images/comentarios/' . $photo->photo);
            }
            $photosComentario->each->delete();
        }
        $comentario = Comentarios::destroy($id);

        return redirect()->back();
    }

    public function destroyPhoto($id)
    {
        $photosComentario = PhotosComentarios::where('id', '=', $id)->get();

        if (Storage::disk('s3')->exists('/images/comentarios/' . $photosComentario[0]->photo)) {
            Storage::disk('s3')->delete('/images/comentarios/' . $photosComentario[0]->photo);
        }
        $photosComentario->each->delete();

        return redirect()->back();
    }
}
