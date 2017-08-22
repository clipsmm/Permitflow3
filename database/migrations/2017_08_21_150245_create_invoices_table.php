<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pk')->unique();
            $table->unsignedInteger('application_id');
            $table->double('amount');
            $table->dateTime('date_paid')->nullable()->default(null);
            $table->string('bill_ref')->unique()->nullable()->default(null);
            $table->string('status');
            $table->timestamps();

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
        Schema::dropIfExists('invoices');
    }
}
