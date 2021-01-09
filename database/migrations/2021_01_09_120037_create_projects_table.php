<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->foreignId('category_id')
                ->index()->constrained('categories')->onDelete('cascade');
            $table->string('title');
            $table->string('image');
            $table->string('thumb_image');
            $table->boolean('status')->default(true);
            $table->string('youtube')->nullable();
            $table->string('github')->nullable();
            $table->string('live')->nullable();
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
        Schema::dropIfExists('projects');
    }
}
