<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWaitingListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('waiting_lists', function (Blueprint $table) {
						$table->bigIncrements('id');
						$table->unsignedBigInteger('patient_id');
						$table->unsignedBigInteger('service_id');
						$table->unsignedBigInteger('doctor_id');
						$table->foreign('patient_id')->references('id')->on('patients');
						$table->foreign('service_id')->references('id')->on('services');
						$table->foreign('doctor_id')->references('id')->on('doctors');
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
        Schema::dropIfExists('waiting_lists');
    }
}
