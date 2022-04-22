<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration {
    public function up() {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->text('name');
            $table->text('short_name')->nullable();
            $table->boolean('has_boxes')->default(false);
            $table->boolean('has_pallets')->default(false);
            $table->boolean('has_bulky_items')->default(false);
            $table->boolean('status')->default(true);

            $table->unique('slug');
        });
    }

    public function down() {
        Schema::dropIfExists('services');
    }
}
