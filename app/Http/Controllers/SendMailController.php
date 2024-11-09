<?php

namespace App\Http\Controllers;

use App\Mail\MessageMail;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendMailController extends Controller
{
    public function index()
    {
        return view('send-mail');
    }
    public function sendMail(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'email' => 'required|email',
                'message' => 'required|string|min:5|max:500',
            ]);
            $email = $validatedData['email'];
            $mailData = [
                'message' => $validatedData['message']
            ];

            Mail::to($email)->send(new MessageMail($mailData));
            return redirect()->back()->with(['success' => "The email has been successfully sent to the specified email address."]);
        } catch (Exception $e) {
            return redirect()->back()->with(['error' =>  $e->getMessage()]);
        }
    }
}
