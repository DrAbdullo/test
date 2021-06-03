<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use  Illuminate\Support\Facades\Log;
use App\Models\User;
use App\Mail\SendMail;
use phpDocumentor\Reflection\Types\This;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;

class SendMassage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $data;

    public $user;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()


    {


        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()

    {


    }
}
