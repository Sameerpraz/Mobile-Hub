<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Order;
use App\Setting;

class NewOrder extends Mailable
{
    use Queueable, SerializesModels;
    public $order;
    public $emails;
    public $email;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order)
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
        return $this->markdown('emails.orders.neworder')->subject('New Order:: ' .config('app.name'))->to($this->emails);
    }
}
