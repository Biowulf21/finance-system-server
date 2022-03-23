<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinanceSystemStudentScholarshipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('finance_system_student_scholarship', function (Blueprint $table) {
            $table->id();
            $table->foreign('student_id')->references('id')->on('financefinance_system_student');
            $table->foreign('scholarship_id')->references('id')->on('finance_system_scholarship');
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
        Schema::dropIfExists('finance_system_student_scholarship');
    }
}
