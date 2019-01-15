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

    public function edit()
    {
    	return view('edit');
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
}
