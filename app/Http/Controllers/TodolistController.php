<?php

namespace App\Http\Controllers;

use App\Models\Todolist;
use Illuminate\Http\Request;

class TodolistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user(); 

        $data = $user->todolists;

        $i = 0;

        return view('Todolist.index', compact('data', 'i', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todolist.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'todo' => 'required'
        ]);

        $user = auth()->user();

        $data = request()->except(['_token']);

        $user->todolists()->create($data);

        return redirect()->route('list')
            ->with('success', 'Todo created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Todolist $todolist)
    {
        return view('Todolist.show', compact('todolist'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Todolist $todolist)
    {
        return view('Todolist.edit', compact('todolist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todolist $todolist)
    {
        $request->validate([
            'todo' => 'required'
        ]);

        $data = request()->except(['_token','_method']);

        $todolist->update($data);

        return redirect()->route('list')
            ->with('success', 'Todo created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todolist $todolist)
    {
        $todolist->delete();

        return redirect()->route('list')
            ->with('success', 'Todo successfully deleted.');
    }
}
