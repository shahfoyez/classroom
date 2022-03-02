<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndustryWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('industry_works', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('instruction');
            $table->string('type')->nullable();
            $table->string('subject');
            $table->string('image')->nullable();
            $table->integer('points')->nullable();
            $table->date('due_date')->nullable();
            $table->time('due_time')->nullable();
            $table->foreignId('classroom_id')
            ->nullable()
            ->index()
            ->constrained()
            ->onDelete('cascade');

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
        Schema::dropIfExists('industry_works');
    }
}
