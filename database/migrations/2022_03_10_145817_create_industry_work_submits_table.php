<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndustryWorkSubmitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('industry_work_submits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('iw_id')->index();
            $table->foreign('iw_id')->references('id')->on('industry_works')->onDelete('cascade')->onUpdate('No Action');

            $table->foreignId('classroom_id')
            ->index()
            ->constrained()
            ->onDelete('cascade');
            $table->string('attachment_path');
            $table->foreignId('user_id')
            ->index()
            ->constrained()
            ->onDelete('cascade')->nullable();
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
        Schema::dropIfExists('industry_work_submits');
    }
}
