<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->nullable();
            $table->string('name')->nullable();
            $table->string('path')->nullable();
            $table->string('city')->nullable();
            $table->string('district')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->text('description')->nullable();

            $table->integer('customer_id')->nullable();
            $table->integer('director_id')->nullable();
            $table->integer('curator_id')->nullable();
            $table->integer('designer_id')->nullable();

            $table->timestamps();
            $table->timestamp('start_at')->nullable();
            $table->timestamp('edit_at')->nullable();
            $table->timestamp('term_at')->nullable();
            $table->timestamp('finish_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
