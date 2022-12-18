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
            $table->id();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('country');
            $table->string('stay_year');
            $table->string('stay_month');
            $table->string('avatar_name');
            $table->string('avatar_image')->nullable();
            $table->string('avatar_introduction')->nullable();
            $table->string('age')->nullable();
            $table->string('gender')
                    ->nullable()
                    ->comment('1:male 2:female');
            $table->string('role_id')
                    ->default(2)
                    ->comment('1:admin 2:user');
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
        Schema::dropIfExists('users');
    }
}
