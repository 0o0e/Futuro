<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;
use App\Models\DiscountCode;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Mail\Mailables\Attachment;

class VaardebonMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(public DiscountCode $discount_code,)
    {
        //
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            // from: new Address('MAIL_FROM_ADDRESS','Futuro Rondvaart'),
            subject: 'Vaardebon Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.vaardebon',
        with: [
            'discount_code' => $this->discount_code,
        ]

        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {

        $pdf = Pdf::loadView("emails.vaardebon-pdf",[
            "discount_code" => $this->discount_code,

        ])->output();
        return [
            Attachment::fromData(fn () => $pdf, 'vaardebon.pdf')
                ->withMime('application/pdf'),
        ];
    }
}
