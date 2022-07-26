@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row justify-content-center mb-5">
		<div class="col-md-8">
			<h1 class="mb-3">{{ $post->title }}</h1>
			<p>By <a href="/blog?author={{ $post->user->username }}" class="text-decoration-none">{{ $post->user->name }}</a> in <a href="/blog?category={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a></p>
			
			<img src="https://source.unsplash.com/1200x600?{{ $post->category->name }}" class="img-fluid rounded" alt="{{ $post->category->name }}">

			<article class="my-3 fs-6 content-justify">
				{!! $post->body !!} 
			</article>

			<a href="/blog">Back to blog</a>
		</div>
	</div>
</div>
			
@endsection
