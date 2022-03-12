<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassIndustryWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_industry_works', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('iw_id')->index();
            $table->foreign('iw_id')->references('id')->on('industry_works')->onDelete('cascade')->onUpdate('No Action');

            $table->foreignId('classroom_id')
            ->index()
            ->constrained()
            ->onDelete('cascade');

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
        Schema::dropIfExists('class_industry_works');
    }
}
