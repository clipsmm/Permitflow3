<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCheckinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('check_ins', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('visa_id');
            $table->timestamp('check_in_at')->useCurrent();
            $table->boolean('check_in_successful')->default(true);
            $table->text('failure_reason')->nullable();

            $table->timestamps();

            $table->foreign('visa_id')->references('id')->on('visas')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('check_ins');
    }
}
