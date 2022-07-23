@extends('layouts.app')

@section('content')
	<article class="mb-5">
			<h1>{{ $post->title }}</h1>
			<p>By Arif Dwi Nugroho in <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a></p>
			{!! $post->body !!} 
	</article>

	<a href="/blog">Back to blog</a>
@endsection
