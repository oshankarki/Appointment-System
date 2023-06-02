<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ApprovalNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $decryptedPassword;

    /**
     * Create a new message instance.
     *
     * @param string $decryptedPassword
     * @return void
     */
    public function __construct($decryptedPassword)
    {
        $this->decryptedPassword = $decryptedPassword;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.approval-notification')
            ->subject('Approval Notification');
    }
}
