<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MySendMail extends Mailable
{
    use Queueable, SerializesModels;
    public $email_detail;
    public $promo_detail;
    public $admin_detail;
    public $student_detail;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email_detail, $promo_detail, $admin_detail, $student_detail)
    {
        $this->email_detail = $email_detail;
        $this->promo_detail = $promo_detail;
        $this->admin_detail = $admin_detail;
        $this->student_detail = $student_detail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->email_detail['asunto'])->view('emails.mySendMail');
    }
}
