<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {
						$table->bigIncrements('id');
						$table->unsignedBigInteger('patient_id');
						$table->unsignedBigInteger('service_id');
						$table->string('number', 15);
						$table->date('regist_date');
						$table->date('expired_date');
						$table->foreign('patient_id')->references('id')->on('patients');
						$table->foreign('service_id')->references('id')->on('services');
						$table->integer('status')->default('0');
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
        Schema::dropIfExists('registrations');
    }
}
