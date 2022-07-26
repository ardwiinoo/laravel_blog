
@extends('layouts.app')

@section('content')
	
<h1 class="mb-5">{{ $title }}</h1>


@if ($posts->count()) <!-- true: jika > 0; dan false: jika < 0; -->
	<!-- Hero post -->
	<div class="card mb-3 shadow-sm p-1 mb-5 bg-body rounded">
		<img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}" class="card-img-top" alt="{{ $posts[0]->category->name }}" loading="lazy">
		<div class="card-body ">
		<h3 class="card-title"><a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none text-dark">{{ $posts[0]->title }}</a></h3>
		<p><small class="text-muted"> 
			By <a href="/authors/{{ $posts[0]->user->username }}" class="text-decoration-none">{{ $posts[0]->user->name }}</a> 
			in <a href="/categories/{{ $posts[0]->category->slug }}" class="text-decoration-none">{{ $posts[0]->category->name }}</a> 
			{{ $posts[0]->created_at->diffForHumans() }} <!-- diffForHumans() akan menampilkan waktu format 3 min ago (library carbon) -->
		</small></p>
		<p class="card-text">{{ $posts[0]->excerpt }}</p>
		<a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-success">Read more</a>
		</div>
	</div>
@else
	<p class="text-center fs-4">Tidak ada post yang ditemukan.</p>
@endif

<div class="container">
	<div class="row">
	@foreach($posts->skip(1) as $post)
		<div class="col-md-4 mb-3">
			<div class="card shadow-sm p-1 mb-5 bg-body rounded">
				<div class="position-absolute text-white px-3 py-2" style="background-color: rgba(0, 0, 0, 0.7)"><a href="/categories/{{ $post->category->slug }}" class="text-white text-decoration-none">{{ $post->category->name }}</a></div>
				<img src="https://source.unsplash.com/300x200?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}" loading="lazy">
				<div class="card-body">
				  <h5 class="card-title">{{ $post->title }}</h5>
				  <p><small class="text-muted"> 
					By <a href="/authors/{{ $post->user->username }}" class="text-decoration-none">{{ $post->user->name }}</a> 
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


@endsection