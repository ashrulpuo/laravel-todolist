<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\task;
use Illuminate\Support\Facades\Auth;

class ToDoController extends Controller
{
    public function index()
    {
    	//$task = DB::table('task')->get();
    	$task = task::all();
    	return view('index', compact('task'));
    }

    public function store(Request $request)
    {
    	if($request->input('task'))
    	{
    		$task = new task;
    		$task ->content = $request->input('task');
    		Auth::user()->task()->save($task);
    	}
    	return redirect()->back();
    }

    public function edit($id)
    {
        $task=task::find($id);
        return view('edit', compact('task'));
    }

    public function update($id, Request $request)
    {
        if($request->input('task'))
        {
            $task=task::find($id);
            $task->content = $request->input('task');
        }else{
            echo "string";
           // return redirect('/');
        }
    }

    public function delete($id)
    {
        $task=task::find($id);
        $task->delete();
        return redirect()->back();
    }

}
