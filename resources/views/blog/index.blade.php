@extends('layouts.main')

@section('title', ' | Blog')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-md-8 offset-md-2">
				<h1> <strong> Blog </strong> </h1>
			</div>
		</div>

		<br>

		@foreach($posts as $post)
			<div class="row">
				<div class="cold-md-8 offset-md-2">
					<h2> {{ $post->title }} </h2>
					<h5> Published: {{ date('M j, Y', strtotime($post->created_at)) }} </h5>

					<p> {{ substr(strip_tags($post->body), 0, 250) }}{{ strlen(strip_tags($post->body)) > 250 ? '...' : '' }} </p>

					<a href="{{ url('/blog/'.$post->slug) }}" class="btn btn-primary btn-md"> Read more </a>
				</div>
			</div>

			<hr>
		@endforeach

		<div class="row">
			<div class="col-md-12">
				{!! $posts->links(); !!}
			</div>
		</div>

	</div>

@stop