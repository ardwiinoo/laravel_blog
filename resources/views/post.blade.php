@extends('layouts.app')

@section('content')
	<article class="mb-5">
			<h1>{{ $post->title }}</h1>
			{!! $post->body !!} 
	</article>

	<a href="/blog">Back to blog</a>
@endsection
