@extends('layouts.app')

@section('content')
	<article class="mb-5">
			<h1>{{ $post->title }}</h1>
			<p>By <a href="#" class="text-decoration-none">{{ $post->user->name }}</a> in <a href="/categories/{{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a></p>
			{!! $post->body !!} 
	</article>

	<a href="/blog">Back to blog</a>
@endsection
