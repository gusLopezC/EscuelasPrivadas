<?php

namespace App\Http\Controllers\User\Chat;

use App\Bookings;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Pusher\Pusher;


use App\User;
use App\Message;


class ChatController extends Controller
{
    //

    public function index()
    {

        if (Auth::user()->role == 'SCHOOL_ROLE') {
            $users = Bookings::select(
                'bookings.id',
                'bookings.name',
                'bookings.school_id',
                'bookings.visitante_id',
                'bookings.receptor_id'
            )
                ->groupBy('bookings.visitante_id')
                ->get();

            return view('user.messages.schoolmessages', ['users' => $users]);
        } else {

            $users = Bookings::select(
                'bookings.id',
                'bookings.school_id',
                'bookings.visitante_id',
                'bookings.receptor_id',
                DB::raw('count(messages.is_read) as MensajesNoVistos')
            )
                ->with('getEscuela')
                ->leftJoin('messages', function ($join) {
                    $join->on('messages.from', '=', 'bookings.visitante_id');
                    $join->on('messages.is_read', '=', DB::raw('0'));
                    $join->on('messages.to', '=', DB::raw(Auth::id()));
                })
                ->where('bookings.visitante_id', '=', Auth::id())
                ->groupBy('bookings.school_id')
                ->get();


            //$users = DB::select("select users.id, users.name, users.img, users.email, count(is_read) as unread
            //from users LEFT  JOIN  messages ON users.id = messages.from and is_read = 0 and messages.to = " . Auth::id() . "
            //where users.id != " . Auth::id() . "
            //group by users.id, users.name, users.img, users.email");
            return view('user.messages.messages', ['users' => $users]);
        }
    }

    public function getMessage($user_id)
    {


        $my_id = Auth::id();



        // Make read all unread message
        //Message::where(['from' => $user_id, 'to' => $my_id])->update(['is_read' => 0]);

        // Get all message from selected user

        $messages = Message::where(function ($query) use ($user_id, $my_id) {
            $query->where('from', $user_id)->where('to', $my_id);
        })->oRwhere(function ($query) use ($user_id, $my_id) {
            $query->where('from', $my_id)->where('to', $user_id);
        })->get();



        return view('user.messages.mensaje.index', ['messages' => $messages]);
    }


    public function sendMessage(Request $request)
    {
        $from = Auth::id();
        $to = $request->receiver_id;
        $message = $request->message;

        $data = new Message();
        $data->from = $from;
        $data->to = $to;
        $data->message = $message;
        $data->is_read = 0; // message will be unread when sending message
        $data->save();


        // pusher
        $options = array(
            'cluster' => 'us2',
            'useTLS' => true
        );

        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );

        $data = ['from' => $from, 'to' => $to]; // sending from and to user id when pressed enter
        $pusher->trigger('my-channel', 'my-event', $data);
    }
}
