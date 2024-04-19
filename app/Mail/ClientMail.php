<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ClientMail extends Mailable
{
    use Queueable, SerializesModels;

    private $Message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($Message)
    {
        $this->Message = $Message;
    }

   /**
 * Build the message.
 *
 * @return $this
 */
public function build()
{
    return $this->subject($this->Message["title"])->markdown('emails.main-mail', ["Message" => $this->Message]);
}
}
