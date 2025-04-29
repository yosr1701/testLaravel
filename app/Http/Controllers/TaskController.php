<?php

namespace App\Http\Controllers; 
use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    
    public function index()
    {
        $tasks = Task::all(); 
        return view('tasks.index', compact('tasks'));
    }

    
    public function create()
    {
        return view('tasks.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
        ]);

        Task::create($request->all());

        return redirect()->route('tasks.index')->with('info', 'Tâche créée avec succès.');
    }

    
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
        ]);

        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'is_completed' => $request->has('is_completed'),
        ]);

        return redirect()->route('tasks.index')->with('info', 'Tâche mise à jour avec succès.');
    }

   
    public function destroy(Task $task)
    {
        $task->delete();

        return back()->with('info', 'Tâche supprimée avec succès.');
    }
}
