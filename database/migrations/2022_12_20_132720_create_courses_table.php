<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string(column: 'name', length: 255);
            $table->unsignedBigInteger(column: 'book')->default(value:0);
            $table->unsignedBigInteger(column: 'year');
            $table->float(column: 'price')->default(value:0.00);
            $table->string(column: 'image', length: 255)->nullable();
            $table->text(column: 'description');
            $table->text(column: 'link');
            $table->unsignedBigInteger(column: 'submitted_by')->nullable();
            $table->unsignedBigInteger(column: 'duration');
            $table->unsignedBigInteger(column: 'platform_id')->nullable();
            $table->foreign(columns: 'submitted_by')->references(columns:'id')->on(table:'users')->onDelete(action:'cascade');
            $table->foreign(columns: 'platform_id')->references(columns:'id')->on(table:'platforms')->onDelete(action:'cascade');
            $table->timestamps();
        });


        Schema::create('course_series', function (Blueprint $table) {
            $table->unsignedBigInteger(column: 'courses_id');
            $table->unsignedBigInteger(column: 'series_id');
            $table->foreign(columns: 'courses_id')->references(columns:'id')->on(table:'courses')->onDelete(action:'cascade');
            $table->foreign(columns: 'series_id')->references(columns:'id')->on(table:'series')->onDelete(action:'cascade');
        });

        Schema::create('course_topic', function (Blueprint $table) {
            $table->unsignedBigInteger(column: 'courses_id');
            $table->unsignedBigInteger(column: 'topic_id');
            $table->foreign(columns: 'courses_id')->references(columns:'id')->on(table:'courses')->onDelete(action:'cascade');
            $table->foreign(columns: 'topic_id')->references(columns:'id')->on(table:'topics')->onDelete(action:'cascade');
        });

        Schema::create('course_author', function (Blueprint $table) {
            $table->unsignedBigInteger(column: 'courses_id');
            $table->unsignedBigInteger(column: 'author_id');
            $table->foreign(columns: 'courses_id')->references(columns:'id')->on(table:'courses')->onDelete(action:'cascade');
            $table->foreign(columns: 'author_id')->references(columns:'id')->on(table:'authors')->onDelete(action:'cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
};
