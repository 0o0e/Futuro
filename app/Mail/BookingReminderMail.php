<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Booking;
use Barryvdh\DomPDF\Facade\Pdf;

class BookingReminderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $booking;

    public function __construct(Booking $booking)
    {
        $this->booking = $booking;
    }

    public function build()
    {
        $invoice = $this->booking->invoice;

        $pdf = Pdf::loadView('emails.invoice-pdf', [
            'booking' => $this->booking,
            'invoice' => $invoice,
        ]);


        return $this->subject('Herinnering: Uw reservering')
            ->view('emails.booking-reminder')
            ->attachData($pdf->output(), "factuur-{$invoice->id}.pdf", [
                'mime' => 'application/pdf',
            ]);
    }
}
