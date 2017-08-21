<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('application_id');
            $table->string('name');
            $table->unsignedInteger('user_id')->nullable();
            $table->string('status');
            $table->text('comments')->nullable();
            $table->dateTime('assigned_at')->nullable()->default(null);
            $table->dateTime('completed_at')->nullable()->default(null);
            $table->dateTime('expires_at')->nullable()->default(null);
            $table->timestamps();

            $table->foreign('application_id')
                ->references('id')
                ->on('applications');
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
