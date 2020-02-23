<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PaymentDone extends Mailable
{
    use Queueable, SerializesModels;
    public $orders;
    public $id;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($orders,$id)
    {
        $this->orders = $orders;
        $this->id = $id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to($this->orders->email)
            ->subject('Payment Done:: ' .config('app.name'))->markdown('emails.paymentdone');
    }
}
