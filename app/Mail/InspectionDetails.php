<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Attachment;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InspectionDetails extends Mailable
{
    use Queueable, SerializesModels;

    public $pdfPath;
    public $caseType;

    /**
     * Create a new message instance.
     */
    public function __construct($pdfPath, $caseType)
    {
        $this->pdfPath = $pdfPath;
        $this->caseType = $caseType;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('wkoundi2@gmail.com', 'KOUNDI WAIL'),
            subject: 'Confirmation de location de véhicule',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        if ($this->caseType === 'depart') {
            return new Content(
                view: 'email',
            );
        } elseif ($this->caseType === 'retour') {
            return new Content(
                view: 'return-email',
            );
        }
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [
            Attachment::fromPath($this->pdfPath)->as('Confirmation de location de véhicule.pdf'),
        ];
    }
}
