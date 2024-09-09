<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255', 
        ]);

        $todos = session()->get('todos', []); 
        $todos[] = ['id' => count($todos) + 1, 'title' => $request->title];
        session(['todos' => $todos]);

        return redirect()->route('todos.index')->with('success', 'Todo added successfully!');
    }

    public function edit($id)
    {
        $todos = session()->get('todos', []);
        $todo = collect($todos)->firstWhere('id', $id); 

        if (!$todo) {
            return redirect()->route('todos.index')->with('error', 'Todo not found.');
        }

        return view('todos.edit', compact('todo')); 
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $todos = session()->get('todos', []);

        foreach ($todos as &$todo) { 
            if ($todo['id'] == $id) {
                $todo['title'] = $request->title;
                break; 
            }
        }

        session(['todos' => $todos]);

        return redirect()->route('todos.index')->with('success', 'Todo updated successfully!');
    }

    public function destroy($id)
    {
        $todos = session()->get('todos', []);

        $todos = array_filter($todos, function ($todo) use ($id) {
            return $todo['id'] != $id; 
        });

        session(['todos' => array_values($todos)]); 

        return redirect()->route('todos.index')->with('success', 'Todo deleted successfully!');
    }

    public function index()
    {
        $todos = session()->get('todos', []);

        return view('todos.index', compact('todos'));
    }

}
