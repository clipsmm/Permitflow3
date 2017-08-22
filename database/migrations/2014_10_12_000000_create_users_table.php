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
            $table->string('id_number')->index();
            $table->string('id_type')->index();
            $table->string('email')->unique();
            $table->string('phone_number')->nullable()->index();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('surname');
            $table->string('full_name')->index();
            $table->string('gender');
            $table->date('dob');
            $table->boolean('email_verified')->default(false);
            $table->boolean('phone_verified')->default(false);
            $table->string('status')->default('active');
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
