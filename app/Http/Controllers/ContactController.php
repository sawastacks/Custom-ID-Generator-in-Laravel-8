<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    function index(){
        return view('contact.index');
    }
    function send(Request $request){
        
        $data = [
            'name'=>$request->name,
            'email'=>$request->email,
            'message'=>$request->message
        ];
          $send = Mail::to('dusonlines@gmail.com')->send(new SendMail($data));
          echo 'Email sent successfully';
    }
}
