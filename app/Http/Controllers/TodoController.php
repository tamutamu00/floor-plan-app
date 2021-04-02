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
        $floor_data = Floor::where('id', $floor_id)->first();
        $floors = Floor::where('user_id', auth::id())->get();
        $now = date('Y/m/d H:i:s');


        return view('todos.index', compact('todos','floor_id', 'floor_data', 'floors', 'now'));

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
    public function show($id, $floor)
    {
        $todo = Todo::find($id);


        return view('todos.show', ['todo' => $todo, 'floor' => $floor]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($floor, $todo)
    {

        $todo_data = Todo::find($todo);
        // dd($todo_data);
        // $todo = Todo::find($id);

        return view('todos/edit', ['todo' => $todo_data, 'floor_id' => $floor]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $floor, $todo)
    {
        $todo_data = Todo::find($todo);


        $todo_data->content = $request->input('content');
        $todo_data->description = $request->input('description');
        $todo_data->floor_id = $floor;
        $todo_data->expired_at = $request->input('expired_at');
        $todo_data->save();


        return redirect()->route('floors.todos.index', ['floor' => $floor])->with(
            'status',
            $todo_data->content . 'を更新しました'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($floor, $todo)
    {
        $todo = Todo::find($todo);

        $todo->delete();

        return redirect()->route('floors.todos.index', ['floor' => $floor])->with(
            'status',
            $todo->content . 'を更新しました'
        );
    }
}
