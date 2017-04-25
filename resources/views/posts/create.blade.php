@extends('layouts.main')

@section('stylesheets')
	<!-- Load Parsley css javascript validator -->
	{!! Html::style('css/parsley.css') !!}
	{!! Html::style('css/select2.min.css') !!}

	<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

	<script type="text/javascript">
		tinymce.init({
			selector: 'textarea',
			plugins: 'link code',
			menubar: false
		});
	</script>
@endsection


@section('title', 'Create new post')

@section('content')

	<div class="container">
		<h1 class="text-center"> Create new post </h1>
		<hr>
			{!! Form::open(array('route' => 'posts.store', 'data-parsley-validate' => '', 'files' => true )) !!}

			{{ csrf_field() }}

			<div class="form-group">
				<!-- Post title -->
				<strong>{!! Form::label('title', 'Title:') !!}</strong>
				{!! Form::text('title', null , array(
				'class' => 'form-control', 
				'required' => '', 
				'maxlength' => '255' ))  !!}
			</div>
			
			<div class="form-group">
				<!-- Post description -->
				<strong>{!! Form::label('slug', 'Post slug:') !!}</strong>
				{!! Form::text('slug', null , array(
				'class' => 'form-control', 
				'required' => '', 
				'minlength' => '5',
				'maxlength' => '255'))  !!}
			</div>

			<div class="form-group">
				<strong>{{ Form::label('category', 'Category:') }}</strong>
				<select class="form-control" name="category">
					@foreach($categories as $category) 
						<option value='{{ $category->id }}'> {{ $category->name }} </option>
					@endforeach
				</select>
			</div>

			<div class="form-group">
				<strong> {{ Form::label('tags', 'Tags:') }}</strong>
				<select class="form-control select2-multi" multiple="multiple" name="tags[]">
					@foreach($tags as $tag) 
						<option value='{{ $tag->id }}'> {{ $tag->name }} </option>
					@endforeach
				</select>
			</div>

			<div class="form-group">
				<strong>{{ Form::label('featured_image', 'Upload featured image:') }}</strong>
				{{ Form::file('featured_image', ['class' => 'form-control']) }}
			</div>

			<div class="form-group">
				<!-- Post content -->
				{!! Form::label('body', 'Post body:') !!}
				{!! Form::textarea('body', null, array(
				'class' => 'form-control', 
				'required' => ''))  !!}
			</div>

			<div class="form-group">
				<!-- Create post submit button -->
				{!! Form::submit('Create post', array('class' => 'btn btn-primary btn-lg btn-block')) !!}
			</div>
			
			{!! Form::close() !!}

	</div>


@endsection


@section('scripts')
	{!! Html::script('js/parsley.min.js') !!}
	{!! Html::script('js/select2.min.js') !!}

	<script type="text/javascript">
		$('.select2-multi').select2();
	</script>
@endsection