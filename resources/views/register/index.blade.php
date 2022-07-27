@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-5">
        <main class="form-registration w-100 m-auto">
            <h1 class="h3 mb-3 mt-4 fw-normal text-center">Registration Form</h1>
            <form action="/register" method="post">
                @csrf
                <div class="form-floating mb-2">
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name" required value="{{ old('name') }}">
                    <label for="name">Name</label>
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating mb-2">
                    <input type="text" name="username" id="username" class="form-control @error('username') is-invalid @enderror" placeholder="Username" required value="{{ old('username') }}">
                    <label for="username">Username</label>
                    @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating mb-2">
                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="name@example.com" required value="{{ old('email') }}">
                    <label for="email">Email address</label>
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating mb-2">
                    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required>
                    <label for="password">Password</label>
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
          
              <button class="w-100 btn btn-lg btn-success" type="submit">Register</button>
            </form>
            <small class="d-block text-center mt-3">Already registered? <a href="/login">Login</a></small>
          </main>
    </div>
</div>

@endsection