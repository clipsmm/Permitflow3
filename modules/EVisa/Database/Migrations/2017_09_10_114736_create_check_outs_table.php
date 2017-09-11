<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCheckOutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('check_outs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('check_in_id');
            $table->timestamp('check_out_at')->useCurrent();
            $table->boolean('check_out_successful')->default(true);
            $table->text('failure_reason')->nullable();

            $table->timestamps();

            $table->foreign('check_in_id')->references('id')->on('check_outs')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('check_outs');
    }
}
