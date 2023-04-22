<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Messaging extends Mailable
{
    use Queueable, SerializesModels;

    public $title,$name,$content,$button,$button_text,$subjcet;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($title,$name,$content,$button,$button_text,$subject)
    {
        $this->title = $title;
        $this->name = $name;
        $this->content = $content;
        $this->button = $button;
        $this->button_text = $button_text;
        $this->subject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('noreply@vantagehorizon.com', 'Vantage Horizon')
                ->subject($this->subject)
                ->view('email.message');
    }
}
