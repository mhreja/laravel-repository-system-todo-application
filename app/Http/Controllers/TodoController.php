<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Todo\TodoRepository;

class TodoController extends Controller
{
    private $todo;

    public function __construct(TodoRepository $todo){
        $this->todo = $todo;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = $this->todo->getAll();
        return view('Todo.index', ['todos'=>$todos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Todo.create');
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
            'title'=>['required', 'string'],
            'description'=>['required']
        ]);
        
        $this->todo->create($request->all());

        return redirect()->route('index')->with('success', 'Todo Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todo = $this->todo->getById($id);
        return view('Todo.edit', ['todo'=>$todo]);
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
        $request->validate([
            'title'=>['required', 'string'],
            'description'=>['required']
        ]);

        $this->todo->update($id, $request->all());

        return redirect()->route('index')->with('success', 'Todo Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->todo->delete($id);
        return redirect()->route('index')->with('danger', 'Todo Deleted');
    }
    
    /**
     * markdone
     * Mark the todo as done, store the now date in db column
     * @param  mixed $id
     * @return void
     */
    public function markdone($id){        
        $this->todo->update($id, ['is_done'=>now()]);
        return redirect()->route('index')->with('info', 'Todo Marked as Done');
    }
}
