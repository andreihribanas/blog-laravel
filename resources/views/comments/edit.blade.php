@extends('layouts.main')

@section('title', ' | Edit comment')

@section('content')

	<div class="container">
		<div class="col-md-8 offset-md-2">
			<div class="row mx-auto">
				<h2> Edit comment </h2>
			</div>

			<hr>

			<div class="row">
				<div class="col-md-12">
					{!! Form::model($comment, ['route' => ['comments.update', $comment->id], 'method' => 'PUT']) !!}
					
					<div class="form-group">
						{{ Form::label('name', 'Name:') }}
						{{ Form::text('name', null, ['class' => 'form-control', 'disabled' => 'disabled']) }}
					</div>
			
					<div class="form-group">
						{{ Form::label('email', 'Email:') }}
						{{ Form::text('email', null, ['class' => 'form-control', 'disabled' => 'disabled']) }}
					</div>

					<div class="form-group">
						{{ Form::label('comment', 'Comment:') }}
						{{ Form::textarea('comment', null, ['class' => 'form-control']) }}
					</div>

					<div class="form-group">
						{{ Form::submit('Update comment', ['class' => 'btn btn-primary btn-block']) }}
					</div>

					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>

@stop