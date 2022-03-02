<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignmentSubmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignment_submissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('assignment_id')
            ->index()
            ->constrained()
            ->onDelete('cascade');

            $table->foreignId('classroom_id')
            ->index()
            ->constrained()
            ->onDelete('cascade');

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
        Schema::dropIfExists('assignment_submissions');
    }
}
