<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     *
     */
    public function index()
    {

        /** Check & create User Manager not exist  */

        $users = User::all();

        $manager_id = $users->find(1);

        if (!$manager_id) {

            $user = new User;
            $user->id = 1;
            $user->name = 'Manager';
            $user->email = 'Manager@mail.com';
            $user->password = Hash::make('123456789');

            $user->save();
            return view('home');
        } else {
            return view('home');
        }
    }
}
