<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificates', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->date('certificate_expedition');

            $table->unsignedInteger('students_id')->nullable();
            $table->unsignedInteger('courses_id')->nullable();

            $table->foreign('students_id')->references('id')->on('students');
            $table->foreign('courses_id')->references('id')->on('courses');


        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('certificates');
    }
}
