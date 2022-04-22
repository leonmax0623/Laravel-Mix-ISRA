<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TaskManager extends Controller {
    public function index() {
        $users_managers = \App\Models\User::role('admin')->get();

        $orders = \App\Models\Order::with(['user'])->get();

        return view('admin.pages.task-manager', [
            'users_managers' => $users_managers,
            'orders' => $orders
        ]);
    }

    public function createOrUpdateTask() {
        $validator = \Illuminate\Support\Facades\Validator::make(request()->all(), [
            'date' => ['required', 'date_format:"Y-m-d"'],
            'caption' => ['required'],
            'type' => ['required'],
            'status' => ['required'],
            'deadline_datetime' => ['nullable', 'date_format:"d.m.Y H:i"']
        ]);

        if($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $task = \App\Models\TaskManager\Task::findOrNew(request()->input('task_id'));
        $task->user()->associate(auth()->user());
        $task->date = \Carbon\Carbon::createFromFormat('Y-m-d', request()->input('date'));
        $task->caption = request()->input('caption');
        $task->type = request()->input('type');
        $task->manager_id = (int)request()->input('manager_id') > 0 ? request()->input('manager_id') : NULL;
        $task->order_id = (int)request()->input('order_id') > 0 ? request()->input('order_id') : NULL;
        $task->deadline_datetime = request()->input('deadline_datetime') ? \Carbon\Carbon::createFromFormat('d.m.Y H:i', request()->input('deadline_datetime')) : NULL;
        $task->loading_worker = request()->input('loading_worker');
        $task->transport = request()->input('transport');
        $task->details = request()->input('details');
        $task->status = request()->input('status');
        $task->save();

        return $task->id;
    }

    public function deleteTask() {
        $task = \App\Models\TaskManager\Task::find(request()->input('task_id'));

        if($task) {
            $task->delete();
        }

        return response()->json(true);
    }

    public function getCalendarTasks() {
        $date_start = \Carbon\Carbon::createFromTimeString(request()->input('start'));
        $date_end = \Carbon\Carbon::createFromTimeString(request()->input('end'));

        $tasks = \App\Models\TaskManager\Task::whereBetween('date', [$date_start, $date_end])->get();

        return response()->json($tasks);
    }

    public function getTaskInfo() {
        $task = \App\Models\TaskManager\Task::find(request()->input('task_id'));

        return response()->json($task);
    }
}
