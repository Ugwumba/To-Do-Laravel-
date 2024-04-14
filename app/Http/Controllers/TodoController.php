<?php

namespace App\Http\Controllers;


use  App\Models\Todo;
use Illuminate\Http\Request;


class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();

        return  view('welcome', [
            'todos' => $todos
        ]);
    }

    public function store()
    {
       $attributes =  request()->validate([
            'title' => 'required',
            'description'=> 'nullable'
       ]);

       Todo::create($attributes);

       return redirect('/');
    }

    public function update(Todo $todo)
    {
        $todo->update(['isDone' => true]);

        return redirect('/');
    }

    public function destory(Todo $todo)
    {
        $todo->delete();

        return redirect('/');
    }

}
