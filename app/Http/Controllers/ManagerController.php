<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UsersData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ManagerController extends Controller
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
     * Shows Messages from all users
     *
     * @return void
     */
    function manager_all()
    {
        $usds = UsersData::all();
        $uds = $usds->load('user')->first();

        $ud = UsersData::all();
        $usd = $ud->load('user');

        return view('manager', ['data' => $usd, 'mdata' => $uds]);
    }


    /**
     * Checked messages confirmation
     *
     * @param  mixed $request
     * @return void
     */
    function manager_mess(Request $request)
    {
        $review = UsersData::find($request->input('id'));
        $review->confirmed = true;
        $review->save();

        return redirect('manager');
    }


    /**
     * Shows Users Data for Manager
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     */
    public function man_message_show(Request $request, $id = NUll)
    {
        if ($id == NULL) {
            $usds = UsersData::where('confirmed', false)->first();
        } else {
            $usds = UsersData::find($id);
        }
        if (!$id == NULL) {
            $uds = $usds->load('user');
        } else {
            $uds = NULL;
        }
        $ud = UsersData::all();
        if (!$ud == NULL) {
            $usd = $ud->load('user');
        } else {
            $usd = Null;
        }
        $d = $usd->sortBydesc('created_at');

        return view('manager', ['data' => $usd, 'descdata' => $d, 'mdata' => $uds]);
    }


    // public function manage (){


    //   $response = \Gate::inspect('view-Manager',[self::class]);

    //   if($response->denied()){

    //     return redirect('clientForm');
    //   }

    //   return redirect('manager');
    // }

}
