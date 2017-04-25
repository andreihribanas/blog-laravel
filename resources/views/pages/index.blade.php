

@extends('layouts.main')

@section('title', 'Homepage')


@section('content')


	<div class="container">
		<div class="row">
			<h1 class="text-center"> Posts </h1> 
		</div>

		<hr>

		<div class="row">
			<div class="col-md-8">


				@foreach ($posts as $post)
					<!-- start of post container -->
					<div class="post"> 
						<h3> {{ $post->title}} </h3>
						<p> {{ substr(strip_tags($post->body), 0, 300)}}{{ strlen(strip_tags($post->body)) > 300 ? '...' : '' }} </p>
						<a href="{{ url('/blog/'.$post->slug) }}" class="btn btn-primary btn-md"> Read more </a>
					</div> <!-- end of post container -->
					<hr>
				@endforeach

			</div> <!-- end of div posts -->

			<div class="col-md-3 offset-md-1">
				<p> Sidebar </p>
			</div> <!-- end of div sidebar --> 
		</div>

	</div>


@endsection