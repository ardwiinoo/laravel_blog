@extends('layouts.app') {{-- folder layouts file app --}}


@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-6 mt-3">
			<div class="card mb-3">
				<div class="card-body">
					<h4><a href="/blog" class="text-decoration-none text-dark"><i class="bi bi-file-earmark-text"></i> Blog</a></h4>
					<p>Lihat semua artikel terbaru dari penulis favorit.</p>
				</div>
			</div>
			<div class="card mb-3">
				<div class="card-body">
					<h4><a href="/categories" class="text-decoration-none text-dark"><i class="bi bi-tags"></i> Category</a></h4>
					<p>Lihat semua kategori post yang tersedia.</p>
				</div>
			</div>
			<div class="card">
				<div class="card-body">
					<h4><a href="/login" class="text-decoration-none text-dark"><i class="bi bi-pencil-square"></i> Dashboard</a></h4>
					<p>Bergabung dan mulai menulis sesuatu.</p>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection