<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskManagerTasksTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('task_manager_tasks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->date('date');
            $table->string('caption');
            $table->tinyInteger('type');
            $table->unsignedBigInteger('manager_id')->nullable();
            $table->unsignedBigInteger('order_id')->nullable();
            $table->dateTime('deadline_datetime')->nullable();
            $table->string('loading_worker')->nullable();
            $table->string('transport')->nullable();
            $table->text('details')->nullable();
            $table->tinyInteger('status')->default(0);

            $table->foreign('manager_id')->references('id')->on('users')->nullOnDelete();
            $table->foreign('user_id')->references('id')->on('users')->nullOnDelete();
            $table->foreign('order_id')->references('id')->on('orders')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('task_manager_tasks');
    }
}
