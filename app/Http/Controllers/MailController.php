<?php

namespace App\Http\Controllers;



use App\Models\User;
use App\Mail\SendMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;


class MailController extends Controller
{


    /**
     * SendMailAndAttach
     *
     * @param  mixed $request
     * @param  mixed $furl
     * @return void
     */
    function SendMailAndAttach(Request $request, $furl)
    {
        $id = Auth::user()->id;
        $senddata = User::find($id);

        $date = $request->date;
        $title = $request->title;
        $content = $request->content;
        $name = $senddata->name;
        $mail = $senddata->email;
        $id = $senddata->id;
        $fileName = $furl;

        Mail::to('manager@mail.com')
            ->queue(new SendMail($mail, $name, $content, $id, $title, $date, $fileName));
    }
}
