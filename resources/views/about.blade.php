@extends('layouts.app')

@section('content')
	<center><h1>Ini adalah halaman About</h1></center>
	<br>
	<h3>{{ $name }}</h3>
	<p>{{ $email }}</p>
	<img src="img/{{ $image }}" alt="{{ $name }}" class="img-thumbnail rounded-circle">
@endsection
