<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\User;
use Illuminate\Support\Facades\Redirect;

class MailController extends Controller
{
    public function sendEmailReminder($id = null)
    {
        $user = User::findOrFail($id);

        Mail::send('auth.send.mail', ['email' => base64_encode($user->email)], function ($m) use ($user) {
            $m->from('hoda.laravelblog@gmail.com', 'Laravel blog');

            $m->to($user->email, $user->name)->subject('Your Reminder!');
        });
    }
    
    public function getConfirm($email = null){
        if(!$email){
            return redirect('login');
        }
        $user = User::whereEmail(base64_decode($email))->first();
        if(! $user)
    	{
    		return redirect('login');
    	}

    	$user->confirmed = 1;
    	$user->save();
    	return redirect('login');
    }
}
