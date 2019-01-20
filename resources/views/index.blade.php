@extends('layouts.master')

@section('content')

<table class="highlight">
  <thead>
    <tr>
      <th>Task</th>
      @isAdmin
      <th>Assigned To</th>
      @endisAdmin
      <th>Edit</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
    @foreach($task as $list)

    <tr>
      <td><a href="{{ route('updateStatus', $list->id )}}">
        @if(!$list->status)
        {{ $list->content }}
        @else
        <strike class="grey-text">{{ $list->content }}</strike>
        @endif
      </a></td>

      @isAdmin
      <td>{{ $list->user->name }}</td>
      @endisAdmin

      <td><a title="edit" href="{{ route('edit', $list->id ) }}"><i class="small material-icons">edit</i></a></td>
      <td><a title="delete" href="{{ route('delete', $list->id ) }}" onclick="return confirm('Delete ?')"><i class="small material-icons">delete</i></a></td>
    </tr>

    @endforeach
  </tbody>

</table>
<?php //print_r($tasks) ?>
<br>

{{ $task->links('vendor.pagination.materialize') }}
<!-- <ul class="pagination">
  <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
  <li class="active"><a href="#!">1</a></li>
  <li class="waves-effect"><a href="#!">2</a></li>
  <li class="waves-effect"><a href="#!">3</a></li>
  <li class="waves-effect"><a href="#!">4</a></li>
  <li class="waves-effect"><a href="#!">5</a></li>
  <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
</ul> -->
<br><br>

@isAdmin
<form action="{{ route('store') }}" method="POST" class="col s12">
  <div class="row">
    <div class="input-field col s6">
      <input placeholder="Please insert" id="Task" type="text" class="validate">
      <label for="Task">Task</label>
    </div>
    <div class="input-field col s6">
      <select name="assignTo">
        <option value="" disabled selected>Assign To :</option>
          <option value="{{ Auth::user()->id }}" disabled selected>To myself</option>
        @foreach($coworker as $workers)
            <option value="{{ $workers->worker->id }}">{{ $workers->worker->name }}</option>
        @endforeach
      </select>
      <label>Assigned To</label>
    </div>
    <br>
  </div>
  <center><button class="waves-effect waves-light btn"><i class="material-icons right">send</i>add new task</button></center>
  @csrf
</form>
<br><br>
@endisAdmin

@isWorker
<form action="{{ route('store') }}" method="POST" class="col s12">
  <div class="input-field col s6">
    <input placeholder="Please insert" name="task" id="task" type="text" class="validate">
    <label for="Task">Task</label>
  </div>
  <br>
  <button class="waves-effect waves-light btn"><i class="material-icons right">send</i>add new task</button>
  @csrf
</form>
<br><br>
<form method="POST" action="{{ route('sendInvitation') }}" class="col s12">
  <div class="input-field col s6">
    <select name="admin">
      <option value="" disabled selected>Send Invitation To :</option>
      @foreach($coworker as $worker)
      <option value="{{ $worker->id }}">{{ $worker->name }}</option>
      @endforeach
    </select>
    <label>Send Invitation To</label>
  </div>
  <br>
  <button class="waves-effect waves-light btn"><i class="material-icons right">send</i>Send Invitation</button> 
  @csrf
</form>
@endisWorker



@isAdmin
<ul class="collection with-header">
  <li class="collection-header center-align"><h4>MyCO-Worker</h4></li>
  @foreach($coworker as $worker)
    <li class="collection-item"><div>{{ $worker->worker->name }}<a title="delete" href="{{ route('deleteWorker',$worker->id)}}"><i class="small material-icons right">delete</i></a></div></li>
  @endforeach
</ul>
@endisAdmin


@endsection

