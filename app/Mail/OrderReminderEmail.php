<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderReminderEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $total;

    public function __construct($name, $total)
    {
        $this->name = $name;
        $this->total = $total;
    }

    public function build()
    {
        return $this->subject('Your Order is Ready to Deliver')
                    ->view('emails.order_reminder');
    }
}
