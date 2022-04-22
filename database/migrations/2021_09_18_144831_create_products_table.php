<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration {
    public function up() {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->text('description');
            $table->string('image')->nullable();
            $table->decimal('price', 11, 2, true)->default(0);
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('products');
    }
}
