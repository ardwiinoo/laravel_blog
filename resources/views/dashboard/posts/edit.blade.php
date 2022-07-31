@extends('dashboard.layouts.app')

@section('content_dashboard')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Post</h1>
    </div>

   <div class="col-lg-8">
    <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="mb-5" enctype="multipart/form-data"> <!-- otomatis mengarah ke method store -->
        @method('put')
        @csrf

        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" autofocus value="{{ old('title', $post->title) }}">
          @error('title')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
          @enderror
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" id="slug" class="form-control @error('slug') is-invalid @enderror" name="slug" readonly value="{{ old('slug', $post->slug) }}">
            @error('slug')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
          @enderror
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select class="form-select" name="category_id">
                @foreach ($categories as $category)
                    @if (old('category_id', $post->category_id) == $category->id)
                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                    @else
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label @error('image') is-invalid @enderror">Post Image (Thumbnail)</label>
            @if ($post->image)
                <img src="{{ asset('storage/' .$post->image)}}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
            @else
                <img class="img-preview img-fluid mb-3 col-sm-5">
            @endif
            <input class="form-control" type="file" id="image" name="image" onchange="previewImage()">
            @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="body" class="form-label">Body</label>
            @error('body')
                <p class="text-danger">{{ $message }}</p>
            @enderror
            <input id="body" type="hidden" name="body" value="{{ old('body', $post->body) }}">
            <trix-editor input="body"></trix-editor>
        </div>


        <button type="submit" class="btn btn-success">Update Post</button>
    </form>
   </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');
        
        title.addEventListener('change', function() {
            fetch(`/dashboard/posts/checkSlug?title=${title.value}`)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
        });

        // nonaktifkan file upload di body
        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        })

        // preview image
        function previewImage() {
            const imgPreview = document.querySelector('.img-preview');
            const blob = URL.createObjectURL(image.files[0]);
            imgPreview.style.display = 'block';
            imgPreview.src = blob;

            // cara kedua
            // const image = document.querySelector('#image');
            // const imgPreview = document.querySelector('.img-preview');

            // imgPreview.style.display = 'block'; // agar tampil

            // const oFReader = new FileReader();
            // oFReader.readAsDataURL(image.files[0]);

            // oFReader.onload = function(oFREvent) {
            //     imgPreview.src = oFREvent.target.result;
            // }
            // console.log('berhasil')
        }
    </script>

@endsection