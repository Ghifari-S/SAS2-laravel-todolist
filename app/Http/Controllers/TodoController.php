<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $todos = Todo::all(); // ambil semua todo tanpa filter user
        return view('todos.index', compact('todos'));
    }

    public function edit(Todo $todo)
    {
        return view('todos.edit', compact('todo'));
    }

    public function create()
    {
        return view('todos.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $todo = Todo::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'user_id' => Auth::id(), // konsisten sama index()
            'completed' => false,
        ]);

        return redirect()->route('todos.index')->with('success', 'Todo berhasil dibuat!');
    }



    public function update(Request $request, Todo $todo)
    {

        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'completed' => 'nullable|boolean'
        ]);

        $todo->update([
            'title' => $request->title,
            'description' => $request->description,
            'completed' => $request->has('completed'),
        ]);

        return redirect()->route('todos.index')->with('success', 'Todo updated!');
    }

    public function destroy(Todo $todo)
    {

        $todo->delete();

        return redirect()->route('todos.index')->with('success', 'Todo deleted!');
    }
    public function pending()
    {
        $todos = Todo::where('user_id', Auth::id())
            ->where('completed', false)
            ->get();

        return view('todos.pending', compact('todos'));
    }
    public function show($id)
    {
        $todo = Todo::findOrFail($id);
        return view('todos.show', compact('todo'));
    }

    public function updateStatus(Request $request, Todo $todo)
    {

        $request->validate([
            'completed' => 'required|boolean',
        ]);

        $todo->completed = $request->completed;
        $todo->save();

        return redirect()->back()->with('success', 'Status Todo berhasil diubah.');
    }
}
