<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
						$table->bigIncrements('id');
						$table->unsignedBigInteger('user_id');
						$table->foreign('user_id')->references('id')->on('users');
						$table->string('nip', 18)->unique();
						$table->string('name');
						$table->date('date_of_birth');
						$table->string('phone');
						$table->text('address');
						$table->text('photo')->nullable();
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
        Schema::dropIfExists('doctors');
    }
}
