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
            $table->string('name');
            $table->text('detail');
            $table->string('sponsor');
            $table->integer('price');
            $table->integer('duration');
            $table->date('start');
            $table->date('finish');
            $table->integer('user_id')->unsigned()->index();
            $table->timestamps();
            $table->engine = 'MyISAM';
            // $table->charset= 'utf8';
            // $table->collation = 'utf8_unicode_ci';
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
