<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCheckUpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('check_ups', function (Blueprint $table) {
						$table->bigIncrements('id');
						$table->date('check_date');
						$table->unsignedBigInteger('patient_id');
						$table->unsignedBigInteger('doctor_id');
						$table->foreign('patient_id')->references('id')->on('patients');
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
        Schema::dropIfExists('check_ups');
    }
}
