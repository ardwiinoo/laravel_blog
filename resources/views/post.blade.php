@extends('layouts.app')

@section('content')
	<article class="mb-5">
			<h2><a href="/posts/{{ $post['slug'] }}">{{ $post['title'] }}</a></h2>
			<small><b>{{ $post['author'] }}</b></small>
			<p>{{ $post['body'] }}</p>
	</article>

	<a href="/blog">Back to blog</a>
@endsection
