<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;
    public $SentData;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($SentData)
    {
        $this->SentData = $SentData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Đặt lại mật khẩu từ BAKERYLELOI')->replyTo('leloi2002nvt@gmail.com','LE LOI')->view('emails.interfaceEmail',['sentData'=>$this->SentData]);
    }
}
