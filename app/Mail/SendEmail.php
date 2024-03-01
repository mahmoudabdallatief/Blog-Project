<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $email;
    public $template;
    public $token;
    /**
     * Create a new message instance.
     *
     * @param string $subject
     * @param string $email
     * @param string $template
     * @param string $token
     * @return void
     */
    public function __construct($subject, $email, $template,$token)
    {
        $this->subject = $subject;
        $this->email = $email;
        $this->template = $template;
        $this->token = $token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
{
    
    return $this->subject($this->subject)
                ->to($this->email)
                ->markdown($this->template) // If it's a Markdown view
                ->with('token', $this->token);
                
}

}