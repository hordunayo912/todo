<?php

namespace App\Http\Controllers;

use App\Models\todo;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

class todoController extends Controller
{
    public function home(){

        return view('home');
    }


    public function show(){
       
        $tasks = todo::all();

        return view('todo', compact('tasks'));
       


        

    }

    public function create(Request $request): RedirectResponse{


        $request->validate([
            'user' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'is_completed' => 'required|string|in:Not Completed,Completed',
            'due_date' => 'nullable|date',
        ]);

        $task = new todo;
        $task->users = $request->user;
        $task->title = $request->title;
        $task->description = $request->description;
        $task->is_completed = $request->is_completed;
        $task->due_date = $request->due_date;

        $task->save();
        return redirect('/todoinfo')->with('success','Task submitted successfully');
      //  return redirect('/todo', compact('tasks'))->with('success','Task submitted successfully');


    }

    public function update(Request $request, $id){
        
        $update = todo::findOrfail($id);

        if($update){


            $update->users = $request->user;
            $update->title = $request->title;
            $update->description = $request->description;
            $update->is_completed = $request->is_completed;
            $update->due_date = $request->due_date;
           
            $update->save();

            return redirect("/edit/$id")->with('success', 'Task modified successfully');
            
        }
        
    }

    public function delete($id){

        $deletes = todo::find($id);
         if ($delete){

            $delete->delete();
         }
    
         return redirect('/todoinfo')->with('delete','Task deleted successfully');
        
    }

    public function edit($id){

        $edit = todo::find($id);

        return view('edit', compact('edit'));
        
    }

   
}
