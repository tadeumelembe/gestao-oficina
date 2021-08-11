<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MailController extends Controller
{
    public static function basic_email($receiverEmail, $receiverName, $subject, $body)
    {
        $to_name = $receiverName;
        $to_email = $receiverEmail;
        $data = array('name' => 'Tadeu Melembe', 'body' => $body);
        Mail::send('emails.mail', $data, function ($message) use ($to_name, $to_email,$subject) {
            $message->to($to_email, $to_name)
            ->cc('vendas@celeninvestimentos.com')
                ->subject($subject);
           // $message->from('tadeumelembe@gmail.com’,’Test Mail');
        });
    }
    
    public function attachment_email()
    {
        $data = array('name' => "Virat Gandhi");
        Mail::send('mail', $data, function ($message) {
            $message->to('abc@gmail.com', 'Tutorials Point')->subject('Laravel Testing Mail with Attachment');
            $message->attach('C:\laravel-master\laravel\public\uploads\image.png');
            $message->attach('C:\laravel-master\laravel\public\uploads\test.txt');
            $message->from('xyz@gmail.com', 'Virat Gandhi');
        });
        echo "Email Sent with attachment. Check your inbox.";
    }
}
