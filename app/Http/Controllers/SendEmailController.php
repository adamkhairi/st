<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class SendEmailController extends Controller
{
    public function index(){
        return view('user/send_email');
    }

    public function send(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'prenom' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);
        
        $data = array(
            'name' => $request->name,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'message' => $request->message
        );

        
        Mail::to('stage.mail111@gmail.com')->send(new SendMail($data));
        return back()->with('success', 'thanks for contacting us!');
    }
}