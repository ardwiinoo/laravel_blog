@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-5">
        <main class="form-registration w-100 m-auto">
            <h1 class="h3 mb-3 mt-4 fw-normal text-center">Registration Form</h1>
            <form>
                
                <div class="form-floating mb-2">
                    <input type="text" name="name" id="name" class="form-control" placeholder="Name">
                    <label for="name">Name</label>
                </div>
                <div class="form-floating mb-2">
                    <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                    <label for="username">Username</label>
                </div>
                <div class="form-floating mb-2">
                    <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                    <label for="username">Username</label>
                </div>
                <div class="form-floating mb-2">
                    <input type="email" name="email" id="email" class="form-control" placeholder="name@example.com">
                    <label for="email">Email address</label>
                </div>
                <div class="form-floating mb-2">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                    <label for="password">Password</label>
                </div>
          
              <button class="w-100 btn btn-lg btn-success" type="submit">Register</button>
            </form>
            <small class="d-block text-center mt-3">Already registered? <a href="/login">Login</a></small>
          </main>
    </div>
</div>

@endsection