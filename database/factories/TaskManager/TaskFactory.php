<?php

namespace Database\Factories\TaskManager;

use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory {
    protected $model = \App\Models\TaskManager\Task::class;

    public function definition() {
        $date = \Carbon\Carbon::now()->addDays(rand(-20, 20))->addHours(rand(-5, 5))->addMinutes(rand(-60, 60))->addSeconds(rand(-60, 60));

        return [
            'date' => $date,
            'caption' => $this->faker->text(rand(5, 25)),
            'type' => collect(config('enum.task_manager_task_type'))->random()['id'],
            'deadline_datetime' => $date->addDays(rand(0, 2))->addHours(rand(0, 24))->addMinutes(rand(0, 60))->addSeconds(rand(0, 60)),
            'loading_worker' => $this->faker->name(),
            'transport' => $this->faker->text(rand(5, 15)),
            'details' => $this->faker->text(rand(5, 50)),
            'status' => collect(config('enum.task_manager_task_status'))->random()['id']
        ];
    }
}
