
@extends('layouts.app')

@section('content')
	
<h1 class="mb-3 text-center">{{ $title }}</h1>

<div class="row justify-content-center mb-3">
	<div class="col-md-6">
		<form action="/blog">
			@if (request('category')) 
				<input type="hidden" name="category" value="{{ request('category') }}">
			@endif
			@if (request('author')) 
				<input type="hidden" name="author" value="{{ request('author') }}">
			@endif
			<div class="input-group mb-3">
				<input type="text" class="form-control" placeholder="Search.." name="search" value="{{ request('search') }}">
				<button class="btn btn-success" type="submit">Search</button>
			  </div>
		</form>
	</div>
</div>


@if ($posts->count()) <!-- true: jika > 0; dan false: jika < 0; -->
	<!-- Hero post -->
	<div class="card mb-3 shadow-sm p-1 mb-5 bg-body rounded">
		@if ($posts[0]->image)
			<div style="max-height: 400px; overflow: hidden">
				<img src="{{ asset('storage/' . $posts[0]->image) }}" class="card-img-top" alt="{{ $posts[0]->category->name }}">
			</div>
		@else
			<img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}" class="card-img-top" alt="{{ $posts[0]->category->name }}" loading="lazy">
		@endif
		<div class="card-body ">
		<h3 class="card-title"><a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none text-dark">{{ $posts[0]->title }}</a></h3>
		<p><small class="text-muted"> 
			By <a href="/blog?author={{ $posts[0]->user->username }}" class="text-decoration-none">{{ $posts[0]->user->name }}</a> 
			in <a href="/blog?category={{ $posts[0]->category->slug }}" class="text-decoration-none">{{ $posts[0]->category->name }}</a> 
			{{ $posts[0]->created_at->diffForHumans() }} <!-- diffForHumans() akan menampilkan waktu format 3 min ago (library carbon) -->
		</small></p>
		<p class="card-text">{{ $posts[0]->excerpt }}</p>
		<a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-success">Read more</a>
		</div>
	</div>

	<div class="container">
		<div class="row">
		@foreach($posts->skip(1) as $post)
			<div class="col-md-4 mb-3">
				<div class="card shadow-sm p-1 mb-5 bg-body rounded">
					<div class="position-absolute text-white px-3 py-2" style="background-color: rgba(0, 0, 0, 0.7)"><a href="/blog?category={{ $post->category->slug }}" class="text-white text-decoration-none">{{ $post->category->name }}</a></div>
					@if ($post->image)
						<img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="{{ $post->category->name }}">
					@else
						<img src="https://source.unsplash.com/300x200?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}" loading="lazy">	
					@endif
					<div class="card-body">
					<h5 class="card-title">{{ $post->title }}</h5>
					<p><small class="text-muted"> 
						By <a href="/blog?author={{ $post->user->username }}" class="text-decoration-none">{{ $post->user->name }}</a> 
						{{ $post->created_at->diffForHumans() }} <!-- diffForHumans() akan menampilkan waktu format 3 min ago (library carbon) -->
						</small></p>
					<p class="card-text">{{ $post->excerpt }}</p>
					<a href="/posts/{{ $post->slug }}" class="btn btn-success">Read more</a>
					</div>
				</div>
			</div>
		@endforeach
		</div>
	</div>

@else
	<p class="text-center fs-4">Tidak ada post yang ditemukan.</p>
@endif

{{ $posts->links('pagination::bootstrap-5') }}

@endsection