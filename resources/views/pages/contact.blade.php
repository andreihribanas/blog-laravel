
@extends('layouts.main')

@section('title', 'Contact')

@section('content')


		<div class="container">
			
			<div class="row">
				<h1 class="text-center"> <strong> Contact me </strong> </h1>
				<hr>
			</div>

			<form action="{{ url('contact') }}" method="POST">
				{{ csrf_field() }}

				<div class="form-group">
					<label name="name"> Name: </label>
					<input type="text" name="name" class="form-control">
				</div>

				<div class="form-group"></div>
					<label name="email"> Email: </label>
					<input type="text" id="email" name="email" class="form-control">
				<div class="form-group"></div>

				<div class="form-group"></div>
					<label name="subject"> Subject: </label>
					<input type="text" id="subject" name="subject" class="form-control input-lg"> </textarea> 
				<div class="form-group"></div>

				<div class="form-group"></div>
					<label name="message"> Message: </label>
					<textarea id="message" name="message" class="form-control"> </textarea> 
				<div class="form-group"></div>

				<div class="form-group text-center"></div>
					<input type="submit" value="Send message" class="btn btn-primary btn-lg btn-block">
				<div class="form-group"></div>

			</form>
		</div>

@endsection