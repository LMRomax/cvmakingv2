<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCvsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cvs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->json('basics');
            $table->longText('description')->nullable();
            $table->json('experience')->nullable();
            $table->json('education')->nullable();
            $table->json('competences')->nullable();
            $table->json('loisirs')->nullable();
            $table->json('langues')->nullable();
            $table->json('ref')->nullable();
            $table->json('layout')->nullable();
            $table->string('cvphoto')->nullable();
            $table->integer('id_user')->nullable();
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('cvs');
    }
}
