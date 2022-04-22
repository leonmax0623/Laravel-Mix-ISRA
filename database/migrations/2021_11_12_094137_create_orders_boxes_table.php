<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersBoxesTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('orders_boxes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id')->index();
            $table->unsignedBigInteger('virtual_box_id')->nullable()->index();
            $table->string('comment')->nullable();
            $table->boolean('is_rent')->default(false);
            $table->timestamps();

            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('virtual_box_id')->references('id')->on('virtual_boxes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('orders_boxes');
    }
}
