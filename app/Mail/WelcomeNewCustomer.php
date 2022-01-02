<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Customer;

class WelcomeNewCustomer extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var Customer
     */
    protected Customer $customer;

    /**
     * @param Customer $customer
     */
    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->$this->subject('Welcome Email')
            ->view('emails.welcome_new_customer');
    }
}
