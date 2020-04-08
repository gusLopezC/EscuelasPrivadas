<?php

namespace App\Http\Controllers;

use App\Comentarios;
use App\Escuelas;
use Illuminate\Http\Request;

class publicController extends Controller
{
    //
    public function homeview()
    {
        $escuelas = Escuelas::all();

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
        $escuela->services = json_decode($escuela->services, true);
        $escuela->redsocial = json_decode($escuela->redsocial, true);

        $comentarios = Comentarios::where('escuela_id', '=', $escuela->id)
            ->with('getPhotosComentario')
            ->with('getUser')
            ->take(10)
            ->get();

        return view('school.school', compact('escuela', 'comentarios'));
    }
}
