<?php

namespace App\Http\Controllers;

use App\Mail\MessageResive;
use Illuminate\Support\Facades\Mail;

//use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function store()
    {
       $mensaje = request()->validate([
            'nombre'=>'required',
            'correo'=>'required|email',
            'subject'=>'required',
            'content'=>'required|min:3'
        ]);

        //enviar email
        Mail::to('miiguellangellmc@gmail.com')->queue(new MessageResive($mensaje));

        return back();
    }
}
