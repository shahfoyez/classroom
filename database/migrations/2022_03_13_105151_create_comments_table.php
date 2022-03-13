<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->string('comment');

            $table->unsignedBigInteger('as_id')->index();
            $table->foreign('as_id')->references('id')->on('assignments')->onDelete('cascade')->onUpdate('No Action');

            $table->foreignId('classroom_id')
            ->index()
            ->constrained()
            ->onDelete('cascade');

            $table->foreignId('user_id')
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
        Schema::dropIfExists('comments');
    }
}
