<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderConfirmationEmail extends Mailable
{
    use Queueable, SerializesModels;


    public $username;
    public $total;

    public function __construct($username, $total)
    {
        $this->username = $username;
        $this->total = $total;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Order Confirmation Email',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.order_confirmation',
            with: [
                'username' => $this->username,
                'total' => $this->total,
            ],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
