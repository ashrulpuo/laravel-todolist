<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\task;

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
}
