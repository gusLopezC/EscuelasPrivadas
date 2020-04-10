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
        $pagination = 10;

        if (request()->city && request()->category) {
            $escuelas = \DB::table('escuelas')
                ->select('escuelas.id', 'escuelas.name', 'escuelas.slug', 'escuelas.categoria', 'escuelas.address', 'escuelas.calification', 'escuelas.ciudad', 'escuelas.nivelpromo', 'escuelas.verificado', 'escuelas.created_at', 'photos_escuelas.photo')
                ->where('escuelas.ciudad', '=',  request()->city)
                ->Orwhere('escuelas_nivels.' . request()->category, '=', true)
                ->join('escuelas_nivels', 'escuelas_nivels.escuela_id', '=', 'escuelas.id')
                ->join('photos_escuelas', 'photos_escuelas.escuela_id', '=', 'escuelas.id')
                ->groupBy('escuelas.name');
        }
        if (request()->city && !(request()->category)) {
            $escuelas = \DB::table('escuelas')
                ->select('escuelas.id', 'escuelas.name', 'escuelas.slug', 'escuelas.categoria', 'escuelas.address', 'escuelas.calification', 'escuelas.nivelpromo', 'escuelas.verificado', 'escuelas.created_at', 'photos_escuelas.photo')
                ->where('escuelas.ciudad', '=',  request()->city)
                ->join('escuelas_nivels', 'escuelas_nivels.escuela_id', '=', 'escuelas.id')
                ->join('photos_escuelas', 'photos_escuelas.escuela_id', '=', 'escuelas.id')
                ->groupBy('escuelas.name');
        }

        if (request()->category && !(request()->city)) {
            $escuelas = \DB::table('escuelas')
                ->select('escuelas.id', 'escuelas.name', 'escuelas.slug', 'escuelas.categoria', 'escuelas.address', 'escuelas.calification', 'escuelas.nivelpromo', 'escuelas.verificado', 'escuelas.created_at', 'photos_escuelas.photo')
                ->where('escuelas_nivels.' . request()->category, '=', true)
                ->join('escuelas_nivels', 'escuelas_nivels.escuela_id', '=', 'escuelas.id')
                ->join('photos_escuelas', 'photos_escuelas.escuela_id', '=', 'escuelas.id')
                ->groupBy('escuelas.name');
        }

        if (request()->type) {
            $escuelas = $escuelas->where('categoria', '=', request()->type);
        }

        if (request()->order == 'HighestRated') {
            $escuelas = $escuelas->orderByDesc('calification');
        } elseif (request()->order == 'NewestListings') {
            $escuelas = $escuelas->orderByDesc('created_at');
        } elseif (request()->order == 'default') {
            $escuelas = $escuelas->orderByDesc('nivelpromo');
        }

        $escuelas = $escuelas->orderByDesc('nivelpromo')->paginate($pagination);

        return view('search.search')->with([
            'escuelas' => $escuelas
        ]);
    }
}
