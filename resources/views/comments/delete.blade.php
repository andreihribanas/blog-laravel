@extends('layouts.main')

@section('title', ' | Delete comment')

@section('content')

	<div class="container">
		<div class="col-md-8 offset-md-2">
			<div class="row">
				<h2> Delete comment </h2> 
			</div>
			<hr>

			<div class="row col-md-8 offset-md-2">
				<p>
					<strong>Name:</strong> {{ $comment->name }} <br>
					<strong>Email:</strong> {{ $comment->email }} <br>
					<strong>Comment:</strong> {{ $comment->comment }} 
				</p>
			</div>

			<br>
	
			<div class="row col-md-8 offset-md-2">
				{!! Form::open(['route' =>['comments.destroy', $comment->id], 'method' => 'DELETE' ]) !!}
				
				{{ Form::submit('Delete this comment?', ['class' => 'btn btn-danger btn-block'])}}

				{!! Form::close() !!}
			</div>

		</div>
	</div>

@stop