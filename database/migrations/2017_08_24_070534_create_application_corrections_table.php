<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationCorrectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_corrections', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('task_id');
            $table->unsignedInteger('application_id');
            $table->text('comment');
            $table->timestamp('completed_at')->nullable();
            $table->timestamps();

            $table->foreign('task_id')
                ->references('id')
                ->on('tasks');

            $table->foreign('application_id')
                ->references('id')
                ->on('applications');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('application_corrections');
    }
}
