@extends('layouts.master')

@section('content')
	<form class="col s12">
		<div class="row">
			<div class="input-field col s12">
				<input value="Task content to edit" id="task2" type="text" name="tas2" class="validate">
				<label for="Task">Edit task</label>
			</div>
		</div>
			<a class="waves-effect waves-light btn">Edit task</a>
	</form>
@endsection