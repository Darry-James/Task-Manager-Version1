<?php

namespace App\Http\Controllers;
use App\Todos;
use Illuminate\Http\Request;


class TodosController extends Controller
{
    public function index()
    {
 
    //$todos = Todos::all();

    return view ("todos.index")  ->with('showtodo', Todos::all())   ;
    }
     

    public function show(Todos $todo)

    {
      return view('todos.show') ->with('todo', $todo);
         
    }  

     

    public function create()

    {

    return view('todos.create');


    }

    public function store()

    {

      $this->validate(request(),
      [
      'name' => 'required|min:6|max:12',

      'description' => 'required']);

     //dd(request()->all());

    $data =  request()->all();


    $todo = new Todos();

    $todo->name = $data['name'];
    
    $todo->description = $data['description'];
    $todo->completed = false;
 
    $todo->save();

    session()->flash('success', 'Todo created successfully.');

    return redirect('/todos');

    }


    public function edit(Todos $todo)
{

 

  return view ('todos.edit')->with('todo', $todo);



}

public function update(Todos $todo)
{


  $this->validate(request(),
      [
      'name' => 'required|min:6|max:12',

      'description' => 'required']);

      $data = request()->all();

      //$todo = Todos::find($todoId);

      $todo->name = $data['name'];
      $todo->description = $data['description'];

      $todo->save();

      session()->flash('success', 'Todo updated successfully.');
     return redirect('/todos');

}

public function destory (Todos $todo)

{
  

  $todo->delete();
  session()->flash('success', 'Todo deleted successfully.');

  return redirect('/todos');

}

public function complete(Todos $todo)

{

  $todo->completed= true;

  $todo->save(); 

  session()->flash('success', 'Todo completed successfully.');

  return redirect('/todos');



}


}
