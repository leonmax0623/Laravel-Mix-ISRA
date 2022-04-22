<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('service_id');
            $table->unsignedBigInteger('order_status_id');
            $table->unsignedBigInteger('payment_status_id');
            $table->unsignedBigInteger('payment_type_id');
            $table->unsignedBigInteger('branch_id')->nullable();

            $table->dateTime('delivery_datetime');
            $table->dateTime('pickup_datetime');
            $table->date('expiry_date');

            $table->string('phone_1');
            $table->string('phone_2')->nullable();

            $table->string('address_index');
            $table->string('address_city');
            $table->string('address_street');
            $table->string('address_house');
            $table->string('entrance_code')->nullable();
            $table->string('entrance_floor')->nullable();
            $table->string('entrance_apartment')->nullable();
            $table->boolean('entrance_elevator')->default(false);

            $table->text('comment')->nullable();
            $table->string('rivhit')->nullable();
            $table->string('location')->nullable();

            $table->unsignedDecimal('volume')->nullable();

            $table->timestamps();

            $table->index('user_id');

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('service_id')->references('id')->on('services');
            $table->foreign('branch_id')->references('id')->on('branches');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('orders');
    }
}
