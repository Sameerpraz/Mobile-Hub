<?php

namespace App\Mail;

use App\Order;
use App\Setting;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserPaymentDone extends Mailable
{
    use Queueable, SerializesModels;
    public $order;
    public $emails;
    public $email;
    public $id;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order, $id)
    {
        $this->order = $order;


        $emails = Setting::ofValue('emails');
        $emails = array_filter(array_map('trim',explode(';', $emails)));
        $this->emails = $emails;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.userpaymentdone')->subject('Order Payment Done By User :: ' .config('app.name'))->to($this->emails);
    }
}
