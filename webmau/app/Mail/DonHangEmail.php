<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DonHangEmail extends Mailable
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
        
            return $this->subject('Thông tin đơn hàng - BAKERYLELOI')->replyTo('leloi2002nvt@gmail.com','LE LOI')->view('emails.DonHangEmail',['sentData'=>$this->SentData]);

        
    }
}
