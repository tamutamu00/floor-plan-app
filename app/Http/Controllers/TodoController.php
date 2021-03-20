<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use App\Floor;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($floor)
    {
        $todos = Todo::where('floor_id', $floor)->get();
        $floor_id = $floor;
        
        return view('todos.index', compact('todos','floor_id'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($floor)
    {
        // $floors = Floor::select('name')->get();
        $floors = Floor::all();
        $floor_id = $floor;



        return view('todos.create', ['floors' => $floors, 'floor_id' => $floor]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $floor)
    {
        $todo = new Todo();
        $todo->content = $request->input('content');
        $todo->description = $request->input('description');
        $todo->user_id = Auth::id();
        $todo->floor_id = $floor;
        $todo->expired_at = $request->input('expired_at');
        $todo->save();


        return redirect()->route('floors.todos.index', ['floor' => $floor])->with(
            'status',
            $todo->content . 'を登録しました'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $todo = Todo::find($id);

        return view('todos.show', compact('todo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todo = Todo::find($id);
        // $todo_floor_id = Todo::find($name);
        $floors = Floor::all();
        // dd($floor->name);

        return view('todos/edit', ['todo' => $todo, 'floors'=> $floors,]); #'todo_floor_id' => $todo_floor_id
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $todo = Todo::find($id);

        $todo->content = $request->input('content');
        $todo->description = $request->input('description');
        $todo->floor_id = $request->input('floor_id');
        $todo->expired_at = $request->input('expired_at');
        $todo->save();

        return redirect('todos')->with(
            'status',
            $todo->content . 'を更新しました'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todo = Todo::find($id);
        $todo->delete();

        return redirect('todos')->with(
            'status',
            $todo->content . 'を更新しました'
        );
    }
}
