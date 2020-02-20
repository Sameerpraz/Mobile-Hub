<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PdfLink extends Mailable
{
    use Queueable, SerializesModels;
    public $milk;
    public $id;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($milk,$id)
    {
        $this->milk=$milk;
        $this->id=$id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->to($this->milk->email,$this->milk,$this->id)->markdown('emails.milk.pdf-link')->subject('Milk Subscription Approved :: '.config('app.name'));
    }
}
