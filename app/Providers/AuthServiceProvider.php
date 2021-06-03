<?php

namespace App\Providers;

// use App\Http\Controllers\ManagerController;
// use Illuminate\Http\Request;
// use App\Policies\ManagerPolisy;
use Illuminate\Routing\ResponseFactory;
use App\Models\User;
use App\Models\UsersData;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Response;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

    //    verify last message send time bu User

        Gate::define('check-date', function (User $user) {

            $user_data = new UsersData;
            $cdate = $user_data->where('user_id', '=', $user->id)->orderBy('created_at', 'desc')->pluck('date')->first();
            $today = date('Y-m-d');

            if ($cdate !== $today) {
                return true;
            }
            return false;

        });

        // Access to managers room

        Gate::define('manager-room', function (User $user) {
            if ($user && $user->id == 1 ) {

                return true;
            }

            return false;
        });

    }
}
