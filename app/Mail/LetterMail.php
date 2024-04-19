<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class LetterMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

     private $Message;

    public function __construct($Message)
    {
        $this->Message = $Message;
    }


    public function build()
    {
        return $this->subject($this->Message["title"])->view('emails.letter', ["Message" => $this->Message]);
    }



}
