<?php


use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

// // 02/06/2021 - TAG:
class CreateUsersDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_data', function (Blueprint $table)
         {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->string('title', 150);
            $table->text('content');
            $table->string('furl');
            $table->boolean('confirmed')->nullable()->default(false);
            $table->date('date')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_data');
    }
}
