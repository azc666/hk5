<?php

namespace App\Mail;

use App\Http\Controllers\CartOrderController;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderConfirmEmail extends Mailable
{
    
    use Queueable, SerializesModels;
    
    public $cartOrder;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($cartOrder)
    {
        //
        $this->cartOrder = $cartOrder;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.orderConfirm')
            ->subject('ARH Order Portal Email Confirmation')
            ->from('support@arhorderportal.com')
            //->bcc('support@arhorderportal.com')
            ->bcc('azc99@me.com');
    }
}
