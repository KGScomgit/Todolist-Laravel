<?php

namespace App\Http\Controllers;

use App\Models\Todolist;
use Illuminate\Http\Request;




class TodoController extends Controller

{
    
    public function create()
    {
        return view('todolist.create');
    }

    public function index()
    {
        $todolists = Todolist::all();
        return view('todolist.index',compact('todolists'));
    }
    public function store(Request $request)
    {
        $todolist = Todolist::create($request->validate([
            'title' => 'required|string|max:255',
        ]));
        return redirect()->route('todolist.index');
    }

    public function update(Request $request, $id)
    {
        $todolist = Todolist::findOrFail($id);
        $todolist->update($request->validate([
            'title' => 'string|max:255',
            'completed' => 'boolean',
        ]));
        return redirect()->route('todolist.index');
    }

    public function destroy($id)
    {
        $todolist = Todolist::findOrFail($id);
        $todolist->delete();
        return redirect()->route('todolist.index');
    }
}
