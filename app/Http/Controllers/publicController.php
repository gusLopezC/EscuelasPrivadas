<?php

namespace App\Http\Controllers;

use App\Comentarios;
use App\Escuelas;
use App\EscuelasNivel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactEmail;
use RealRashid\SweetAlert\Facades\Alert;

class publicController extends Controller
{
    //
    public function homeview()
    {
        $escuelas = Escuelas::select('id', 'slug', 'name', 'categoria', 'address', 'calification')
            ->orderBy('nivelpromo', 'desc')
            ->with('getPhotos')
            ->take(10)
            ->get();


        return view('welcome', compact('escuelas'));
        //
    }
    public function nosotrosview()
    {

        return view('public.nosotros');
        //
    }
    public function workschoolview()
    {
        return view('public.workschool');
        //
    }
    public function contactview()
    {
        return view('public.contact');
        //
    }

    public function contactsend(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'comments' => 'required',
        ];

        $this->validate($request, $rules);


        $objMensaje = new \stdClass();
        $objMensaje->name = $request->name;
        $objMensaje->email = $request->email;
        $objMensaje->comments = $request->comments;


        Mail::to("guslopezcallejas@gmail.com")->send(new ContactEmail($objMensaje));
        Alert::success('Mensaje enviado', 'Mensaje enviado correctamente');
        return redirect()->back();

    }
    public function termsAndConditionsview()
    {
        return view('public.support.termsAndConditions');
        //
    }
    public function faqview()
    {
        return view('public.support.faq');
        //
    }

    /**
     *  Vistas detalladas
     */

    public function schoolShow($slug)
    {

        $escuela = Escuelas::where('slug', '=', $slug)
            ->with('getPhotos')
            ->with('getUser')
            ->with('getComentarios')
            ->get();

        $escuela = $escuela[0];
        $escuela->visitas = $escuela->visitas + 1;
        $escuela->save();
        $escuela->services = json_decode($escuela->services, true);
        $escuela->redsocial = json_decode($escuela->redsocial, true);


        $EscuelasNivel = EscuelasNivel::where('escuela_id', '=', $escuela->id)->get();
        $comentarios = Comentarios::where('escuela_id', '=', $escuela->id)
            ->with('getPhotosComentario')
            ->with('getUser')
            ->take(10)
            ->get();

        return view('school.school', compact('escuela', 'comentarios', 'EscuelasNivel'));
    }
}
