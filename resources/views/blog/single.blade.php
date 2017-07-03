@extends('layouts.main')

<?php $titleTag = htmlspecialchars($post->title);   ?>
@section('title', " | $titleTag")

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-md-8 offset-md-2">

				{{ Html::image('images/' . $post->image, 'The image does not exist') }}
				<h1> {{ $post->title }} </h1>	
				<p> {!! $post->body !!} </p>

				<hr>
				<p> Posted in: {{ $post->category->name}} </p>
			</div>
		</div>
<br>
		<!-- Display comments-->
		<div class="row">
			<div class="col-md-8 offset-md-2">
				@foreach($post->comments as $comment)
					<div class="comment">
						<p> <strong>Name:</strong> {{ $comment->name }}
						<p> <strong>Comment:</strong> {{ $comment->comment }}
						<br><br>
					</div>
				@endforeach
			</div>
		</div>

		<!-- Add comments form -->
		<div class="row">

			<div class="comment-form col-md-8 offset-md-2">
			<hr>
				{!! Form::open(['route' => ['comments.store', $post->id] , 'method' =>'POST']) !!}

				<div class="form-group">
					{{ Form:: label('name', 'Name:') }}
					{{ Form::text('name', null, ['class' => 'form-control'])  }}
				</div>

				<div class="form-group">
					{{ Form:: label('email', 'Email:') }}
					{{ Form::text('email', null, ['class' => 'form-control'])  }}
				</div>

				<div class="form-group">
					{{ Form:: label('comment', 'Comment:') }}
					{{ Form::textarea('comment', null, ['class' => 'form-control'])  }}
				</div>

				<div class="form-group">
					{{ Form::submit('Add comment', ['class' => 'btn btn-primary btn-block'])}}
				</div>

				{!! Form::close() !!}
			</div>
		</div>
	</div>

@stop