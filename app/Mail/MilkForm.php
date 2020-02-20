<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;


class MilkForm extends Mailable
{
    use Queueable, SerializesModels;
    public $request;
    public $emails;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($request)
    {
        $emails = \App\Setting::ofValue('emails');
        $emails = array_filter(array_map('trim', explode(';', $emails)));
        $this->emails = $emails;
        $this->request = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.milk.milkform')->subject('Milk Subscription:: ' .config('app.name'))->to($this->emails);
    }
}
