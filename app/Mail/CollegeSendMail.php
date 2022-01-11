<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CollegeSendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $collegemail;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($collegemail)
    {
        $this->collegemail = $collegemail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $collegemail = $this->collegemail;
        return $this->markdown('admin.email.collegemail',compact('collegemail'));
    }
}
