<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Models\Records;
use App\Http\Middleware;
use App\Models\UsersData;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use App\Request\UsersDateRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

/**
 * UserController
 */
class UserController extends Controller
{

    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * ClientForm
     *
     * @return void
     */
    public function clientForm()
    {
        return view('clientForm');
    }



    /**
     * create
     *
     * @param  mixed $request
     * @return void
     */
    public function create(Request $request)
    {
        $furl = $this->addFile($request);
        $review = new UsersData();
        $review->furl = $furl;
        $review->user_id = $request->input('user_id');
        $review->title = $request->input('title');
        $review->content = $request->input('content');
        $review->date = $request->input('date');

        $review->save();

        // Message senddind function

        $mailer = new \App\Http\Controllers\MailController();
        $mailer->SendMailAndAttach($request, $furl);

        return redirect('clientForm')->with('success', 'Сообщение было добавленно');
    }

    /**
     * Collecting User messages
     *
     * @return void
     */
    public function allData()
    {
        $userdata = new UsersData();

        return view('messages', ['data' => $userdata->all()]);
    }

    /**
     * Shows detailed message
     *
     * @param  mixed $id
     * @return void
     */
    public function message_show($id)
    {
        $userdata = new UsersData();
        return view('messages', ['data' => $userdata->find($id)]);
    }



    /**
     * Managers Message confirmation
     *
     * @param  mixed $request
     * @return void
     */
    function manager_mess(Request $request)
    {

        $review = UsersData::find($request->input('id'));
        $review->confirm = true;

        $review->save();

        return view('manager');
    }



    /**
     * Adding Attached file information
     *
     * @param  mixed $request
     * @return void
     */
    public function addFile(Request $request)
    {
        $path = Storage::disk('public')->putFileAs(
            '',
            $request->file('fname'),
            $request->fname->getClientOriginalName()
        );

        $filepath = asset("storage/$path");

        return ($filepath);
    }
}
