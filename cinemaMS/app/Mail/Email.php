<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Email extends Mailable
{
    use Queueable, SerializesModels;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    private $name;
    private $random_code;
    private $message_selection;

    public function __construct($random_code, $name, $message_selection)
    {
        $this->name = $name;
        $this->random_code = $random_code;
        $this->message_selection = $message_selection;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if ($this->message_selection == 1) {
            return $this->subject('خوش آمدید')->view('welcome_message', ['name' => $this->name]);
        }
        return $this->subject('فراموشی رمز عبور')->view('forgetting_password_message', ['code' => $this->random_code]);
    }
}
