<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function store(Request $request)
    {

        try {
            $taskName = $request->input('name');
            $currentDate = now()->toDateString();

            Task::create([
                'name' => $taskName,
                'date' => $currentDate,
            ]);

            $totalTasks = Task::whereDate('date', $currentDate)->count();

            return response()->json(['error' => false, 'message' => 'Task saved successfully', 'total_tasks' => $totalTasks]);
        } catch (\Exception $e) {
            return response()->json(['error' => true, 'message' => 'Error saving task: ' . $e->getMessage()], 500);
        }
    }

    public function tasksToday(Request $request)
    {
        try {
            $today = now()->toDateString();

            $tasksToday = Task::whereDate('date', $today)
                ->whereNotNull('tracked_time')
                ->get();

            $groupedTasks = $tasksToday->groupBy('name')->map(function ($group) {
                return [
                    'name' => $group[0]->name,
                    'total_tracked_time' => $group->sum('tracked_time'),
                ];
            });

            $totalTimeToday = $tasksToday->sum('tracked_time');

            return response()->json(['error' => false, 'tasks_today' => $groupedTasks, 'total_time_today' => $totalTimeToday]);
        } catch (\Exception $e) {
            return response()->json(['error' => true, 'message' => 'Error fetching tasks for today: ' . $e->getMessage()], 500);
        }
    }

    public function stopTask(Request $request)
    {
        try {
            $taskName = $request->input('name');

            $task = Task::where('name', $taskName)->whereNull('tracked_time')->latest()->first();

            if ($task) {
                $currentTime = now();
                $minutesElapsed = $currentTime->diffInMinutes($task->created_at);

                $task->tracked_time = $minutesElapsed;
                $task->save();

                return response()->json(['error' => false, 'message' => 'Task stopped successfully']);
            } else {
                return response()->json(['error' => true, 'message' => 'Task not found or already stopped'], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => true, 'message' => 'Error stopping task: ' . $e->getMessage()], 500);
        }
    }
}
