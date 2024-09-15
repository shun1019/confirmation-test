<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id'); // PRIMARY KEY, bigint unsigned
            $table->string('name', 255); // varchar(255), NOT NULL
            $table->string('email', 255)->unique(); // varchar(255), NOT NULL, UNIQUE
            $table->string('password', 255); // varchar(255), NOT NULL
            $table->timestamps(); // created_at, updated_at as timestamp
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
}
