@extends('layouts.master')

@section('content')
	<form method="POST" action="{{ route('update', ['id'=>$task->id]) }}" class="col s12">
		<div class="row">
			<div class="input-field col s12">
				<input value="{{ $task->content }}" id="task" type="text" name="task" class="validate">
				<label for="Task">Edit task</label>
			</div>
		</div>
			<button type="submit" class="waves-effect waves-light btn">Edit task</button>
		@csrf
	</form>
@endsection