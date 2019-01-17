<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\task;
use App\User;
use App\Invitation;
use Illuminate\Support\Facades\Auth;

class ToDoController extends Controller
{
    public function index()
    {
        if(Auth::user()->is_admin)
        {
            $coworker = Invitation::where('admin_id',Auth::user()->id)->where('accept',1)->get();
            $invitations = Invitation::where('admin_id',Auth::user()->id)->where('accept',0)->get();
            $task = task::where('user_id',Auth::User()->id)->orWhere('admin_id',Auth::user()->admin_id)->orderBy('created_at','DESC')->paginate(4);
        }else{
            $invitations = [];
            $task = task::where('user_id',Auth::User()->id)->orderBy('created_at','DESC')->paginate(4);
            $coworker = User::where('is_admin',1)->get();
        }
    	
        //print_r($coworker);
        return view('index', compact('task','coworker','invitations'));
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

    public function sendInvitation(Request $request)
    {
        if((int) $request->input('admin') > 0 && !Invitation::where('worker_id',Auth::user()->id)->where('admin_id',$request->input('admin'))->exists())
        {
            $invitation = new Invitation;
            $invitation->worker_id = Auth::user()->id;
            $invitation->admin_id = (int) $request->input('admin');
            $invitation->save();
        }
            return redirect()->back();
    }

    public function acceptInvitation($id)
    {
        $invitations = Invitation::find($id);
        $invitations->accept = true;
        $invitations->save();

        return redirect()->back();
    }

    public function denyInvitation($id)
    {
        $invitations = Invitation::find($id);
        $invitations->delete();

        return redirect()->back();
    }
}
