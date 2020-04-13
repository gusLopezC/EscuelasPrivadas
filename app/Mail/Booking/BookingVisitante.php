<?php

namespace App\Mail\Booking;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookingVisitante extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $reserva;
    public $nameEscuela;

    public function __construct($reserva,$nameEscuela)
    {
        $this->reserva = $reserva;
        $this->nameEscuela = $nameEscuela;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.booking.bookingvisitante')->subject('Tienes una reserva de visita');
    }
}
