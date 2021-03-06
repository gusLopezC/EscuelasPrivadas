<?php

namespace App\Http\Controllers\User\Bookings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;

use Illuminate\Support\Facades\Mail;
use App\Mail\Booking\BookingEscuela;
use App\Mail\Booking\BookingVisitante;

use App\Escuelas;
use App\Bookings;


class BookingController extends Controller
{
    //

    public function index( $slug)
    {

        $user = Auth::user();

        $escuela = Escuelas::select('escuelas.id', 'escuelas.slug', 'escuelas.name', 'escuelas.address', 'escuelas.calification', 'escuelas.verificado', 'escuelas.user_id', 'photos_escuelas.photo')
            ->where('slug', '=', $slug)
            ->join('photos_escuelas', 'photos_escuelas.escuela_id', '=', 'escuelas.id')
            ->with('getUser')
            ->get();
        $escuela = $escuela[0];

        return view('booking.booking', compact('escuela', 'user'));
    }


    public function store(Request $request)
    {


        $nameEscuela = $request->NameEscuela;

        $user = Auth::user();

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'date' => 'required',
            'time' => 'required',
            'Guests' => 'required',
            'school_id' => 'required',
            'receptor_id' => 'required',
        ]);


        $reserva = Bookings::create([
            'name' => $request->name,
            'email' =>  $request->email,
            'phone' =>  $request->phone,
            'Date' => Carbon::parse($request->date)->format('Y-m-d'),
            'Hour' =>  $request->time,
            'Guests' =>  $request->Guests,
            'school_id' => $request->school_id,
            'visitante_id' =>  $user->id,
            'receptor_id' =>  $request->receptor_id,

        ]);

        Mail::to($user->email)->send(new BookingEscuela($reserva, $nameEscuela));

        Mail::to($request->emailEscuela)->send(new BookingVisitante($reserva, $nameEscuela));

        Alert::success('Reserva realizada', 'Reserva enviado correctamente');

        return redirect()->route('booking');
    }


    public function showbookings()
    {
        $fecha = Carbon::now()->subDays(1);
        $fecha = Carbon::parse($fecha)->format('Y-m-d');

        $iduser = Auth::user()->id;

       //  return request()->orderBy;

        if (request()->orderBy == 'Activas' || request()->orderBy == '' ) {
            $reservas = Bookings::where('visitante_id', '=', $iduser)
                ->where('Date', '>=', $fecha)
                ->with('getEscuela')
                ->paginate(5);
        } else {
            $reservas = Bookings::where('visitante_id', '=', $iduser)
                ->where('Date', '<', $fecha)
                ->with('getEscuela')
                ->paginate(5);
        }


        return view('user.booking', compact('reservas'));
    }

    public function cancelBooking($id)
    {
        $reserva = Bookings::find($id);

        $reserva->status = 'Cancelado';
        $reserva->save();

        Alert::success('Cancelacion realizada', '');

        return redirect()->back();

    }
}
