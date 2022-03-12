<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndustryGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('industry_grades', function (Blueprint $table) {
            $table->id();
            $table->integer('teacher_points')->nullable();
            $table->integer('industry_points')->nullable();
            $table->unsignedBigInteger('iws_id')->index();
            $table->foreign('iws_id')->references('id')->on('industry_work_submits')->onDelete('cascade')->onUpdate('No Action');
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
        Schema::dropIfExists('industry_grades');
    }
}
