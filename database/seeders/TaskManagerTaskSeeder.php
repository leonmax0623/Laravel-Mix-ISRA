<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TaskManagerTaskSeeder extends Seeder {
    public function run() {
        $admin_users = \App\Models\User::role('admin')->get()->collect();

        \App\Models\TaskManager\Task::factory(100)->make()->each(function($task) use ($admin_users) {
            $task->user()->associate($admin_users->random());

            if(rand(0, 1)) {
                $task->manager()->associate($admin_users->random());
            }

            //todo Сделать когда будет сид заказов.
//            if(rand(0, 1)) {
//                $task->order_id = '';
//            }

            $task->save();
        });
    }
}
