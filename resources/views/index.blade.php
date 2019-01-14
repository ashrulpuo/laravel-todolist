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
    @foreach($task as list)
    <tr>
      <td><a href="">Study laravel</a></td>
      @isAdmin
      <td>{{ $list->user->name}}</td>
      @endisAdmin
      <td><a title="edit" href=""><i class="small material-icons">edit</i></a></td>
      <td><a title="delete" href=""><i class="small material-icons">delete</i></a></td>
    </tr>
  </tbody>
    @endforeach
</table>
<?php //print_r($tasks) ?>
<br>
<ul class="pagination">
  <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
  <li class="active"><a href="#!">1</a></li>
  <li class="waves-effect"><a href="#!">2</a></li>
  <li class="waves-effect"><a href="#!">3</a></li>
  <li class="waves-effect"><a href="#!">4</a></li>
  <li class="waves-effect"><a href="#!">5</a></li>
  <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
</ul>
<br><br>

@isAdmin
<form class="col s12">
  <div class="row">
    <div class="input-field col s6">
      <input placeholder="Please insert" id="Task" type="text" class="validate">
      <label for="Task">Task</label>
    </div>
    <div class="input-field col s6">
      <select>
        <option value="" disabled selected>Assign to :</option>
        <option value="1">ashrul</option>
        <option value="2">ain</option>
        <option value="3">syiera</option>
        <option value="3">nazihah</option>
      </select>
      <label>Assigned To</label>
    </div>
    <br>
  </div>
</form>
<center><a class="waves-effect waves-light btn"><i class="material-icons right">send</i>Add new task</a></center>
<br><br>
@endisAdmin

@isWorker
<form class="col s12">
  <div class="row">
    <div class="input-field col s6">
      <input placeholder="Please insert" id="Task" type="text" class="validate">
      <label for="Task">Task</label>
    </div>
    <div class="input-field col s6">
      <select>
        <option value="" disabled selected>Send Invitation To :</option>
        <option value="1">ashrul</option>
        <option value="2">ain</option>
        <option value="3">syiera</option>
        <option value="3">nazihah</option>
      </select>
      <label>Send Invitation To</label>
    </div>
    <br>
  </div>
</form>
<center><a class="waves-effect waves-light btn"><i class="material-icons right">send</i>Send Invitation</a></center>
<br><br>
@endisWorker



@isAdmin
<ul class="collection with-header">
  <li class="collection-header center-align"><h4>MyCO-Worker</h4></li>
  <li class="collection-item"><div>ashrul<a title="delete" href=""><i class="small material-icons right">delete</i></a></div></li>
  <li class="collection-item"><div>ashrul<a title="delete" href=""><i class="small material-icons right">delete</i></a></div></li>
  <li class="collection-item"><div>ashrul<a title="delete" href=""><i class="small material-icons right">delete</i></a></div></li>
  <li class="collection-item"><div>ashrul<a title="delete" href=""><i class="small material-icons right">delete</i></a></div></li>
</ul>
@endisAdmin


@endsection

