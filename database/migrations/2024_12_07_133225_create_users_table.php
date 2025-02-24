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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id', true);
            $table->string('name');
            $table->unsignedBigInteger('fk_department');
            $table->unsignedBigInteger('fk_designation');
            $table->string('phone_number');
            $table->timestamps();

            $table->primary('id');

            $table->foreign('fk_department')->references('id')->on('departments')->onDelete('cascade');
            $table->foreign('fk_designation')->references('id')->on('designations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
