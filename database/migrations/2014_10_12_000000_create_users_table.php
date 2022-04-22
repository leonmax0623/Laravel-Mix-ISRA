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
            $table->string('first_name', 64)->nullable();
            $table->string('last_name', 64)->nullable();
            $table->string('company_name', 64)->nullable();
            $table->string('company_number', 64)->nullable();
            $table->string('passport_number', 64)->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone', 31);

            $table->unsignedTinyInteger('role_id')->nullable();
            $table->unsignedTinyInteger('country_id')->nullable();
            $table->unsignedTinyInteger('language_id')->nullable();
            $table->unsignedTinyInteger('sex_id')->nullable();
            $table->unsignedTinyInteger('client_type_id')->nullable();

            $table->string('address_index', 64)->nullable();
            $table->string('address_city', 64)->nullable();
            $table->string('address_street', 64)->nullable();
            $table->string('address_house', 64)->nullable();

            $table->string('entrance_code', 32)->nullable();
            $table->string('entrance_floor', 63)->nullable();
            $table->string('entrance_apartment', 63)->nullable();
            $table->boolean('entrance_elevator')->default(false);
            $table->string('rivhit')->nullable();

            $table->text('comment')->nullable();

            $table->rememberToken();
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
