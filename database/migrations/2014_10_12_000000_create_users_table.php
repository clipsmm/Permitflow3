<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_number')->index()->nullable();
            $table->string('id_type')->index()->nullable();
            $table->string('email')->unique();
            $table->string('phone_number')->nullable()->index();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('surname')->nullable();
            $table->string('full_name')->index();
            $table->string('gender')->nullable();
            $table->date('dob')->nullable();
            $table->boolean('email_verified')->nullable()->default(false);
            $table->boolean('phone_verified')->nullable()->default(false);
            $table->string('status')->nullable()->default('active');
            $table->string('password')->nullable();
            $table->softDeletes();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
