<?php
  
namespace App\Mail;
  
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
  
class SuccessMail extends Mailable
{
    use Queueable, SerializesModels;
  
    public $successData;
  
   
    public function __construct($successData)
    {
        $this->successData = $successData;
    }
  
   
    public function build()
    {
        return $this->subject('bhajanapp  Success Registration ')
              ->view('emails.SuccessMail');
    }
}