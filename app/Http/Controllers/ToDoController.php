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
    	$task = task::where('user_id',Auth::User()->id)->paginate(4);
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
            $task->save();
        }
            return redirect('/');
    }

    public function delete($id)
    {
        $task=task::find($id);
        $task->delete();
        return redirect()->back();
    }

     public function updateStatus($id)
    {
        $task=task::find($id);
        $task->status = !$task->status;
        $task->save();
        return redirect()->back();
    }

}
