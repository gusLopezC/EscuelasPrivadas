<?php

namespace App\Http\Controllers;

use App\Escuelas;
use App\EscuelasNivel;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //

    public function search()
    {

        if (request()->category) {
            $escuelas = \DB::table('escuelas')
                ->select('escuelas.id', 'escuelas.name', 'escuelas.slug','escuelas.categoria', 'escuelas.address', 'escuelas.calification', 'escuelas.verificado',  'photos_escuelas.photo')
                ->where('escuelas_nivels.' . request()->category, '=', true)
                ->join('escuelas_nivels', 'escuelas_nivels.escuela_id', '=', 'escuelas.id')
                ->join('photos_escuelas', 'photos_escuelas.escuela_id', '=', 'escuelas.id')
                ->groupBy('escuelas.name')
                ->paginate(10);

        }

//        return $escuelas;

        return view('search.search')->with([
            'escuelas' => $escuelas
        ]);
    }
}
