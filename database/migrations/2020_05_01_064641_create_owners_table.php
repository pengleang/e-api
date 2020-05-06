<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOwnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('owners', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id')->references('id')->on('projects')->OnDelete('cascade')->onUpdate('cascade');
            $table->string('name');
            $table->string('position');
            $table->string('department');
            $table->string('phone');
            $table->string('supervisor');
            $table->text('review');
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
        Schema::dropIfExists('owners');
    }
}
