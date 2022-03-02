<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignments', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('instruction');
            $table->string('type')->nullable();
            $table->integer('points')->nullable();
            $table->date('due_date')->nullable();
            $table->time('due_time')->nullable();
            $table->foreignId('post_id')
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
        Schema::dropIfExists('assignments');
    }
}
