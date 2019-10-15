<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\NewUserWelcomeMail;

class MailController extends Controller
{
    public function index (){
        return new emails.welcome-email;
    }
}
