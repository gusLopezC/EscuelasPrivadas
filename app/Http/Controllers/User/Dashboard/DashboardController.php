<?php

namespace App\Http\Controllers\User\Dashboard;

use App\Escuelas;
use App\Http\Controllers\Controller;
use App\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    //

    public function index()
    {
        $user = Auth::user();

        if ($user->role == 'SCHOOL_ROLE') {
            $estadisticasVisitas = \DB::table('escuelas')
                ->select(\DB::raw('count(id) AS totalPlaces'), \DB::raw("SUM(visitas) as totalVisitas"))
                ->where('user_id', '=', $user->id)
                ->get();

            $estadisticasComentarios = \DB::table('comentarios')
                ->select(\DB::raw('count(comentarios.id) AS totalComentarios'))
                ->where('escuelas.user_id', '=', $user->id)
                ->join('escuelas', 'escuelas.id', '=', 'comentarios.escuela_id')
                ->get();

            $totalReservas = \DB::table('bookings')
                ->select(\DB::raw('count(id) AS totalReservas'))
                ->where('receptor_id', '=', $user->id)
                ->get();

            $escuelas = Escuelas::where('user_id', '=', $user->id)->get();

            $notificationes = Notification::where('user_id', '=', $user->id)->get();

            return view('user.dashboard', compact('estadisticasVisitas', 'estadisticasComentarios', 'totalReservas','escuelas','notificationes'));
        } else {
            return view('user.dashboard');
        }
    }
}
