<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('name')->nullable();
            $table->text('email');
            $table->text('phone')->nullable();
            $table->dateTime('birthday')->nullable();
            $table->text('address')->nullable();
            $table->text('password');
            $table->integer('type')->comment('1. Nhà cung cấp, 2. Đại lý')->default(1);
            $table->integer('id_manufacture')->nullable();
            $table->integer('id_city')->nullable();
            $table->integer('id_district')->nullable();
            $table->integer('id_wards')->nullable();
            $table->string('google_id', 255)->nullable();
            $table->string('facebook_id', 255)->nullable();
            $table->integer('status')->nullable();
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
        Schema::dropIfExists('members');
    }
}