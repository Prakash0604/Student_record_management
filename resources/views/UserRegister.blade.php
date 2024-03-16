@extends('layout')
@section('content')
<div class="container col-4 mt-3">
    <h1 class="text-center bg-dark text-white rounded mt-2 mb-2">Register Here</h1>
    <div class="card p-3">
        @if (session()->has('success'))
        <div class="alert alert-success">{{ session()->get('success') }}</div>
       @endif
        <form action="{{ url('/register') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Name</label>
                <input
                    type="text"
                    name="name"
                    class="form-control @error('name') is-invalid @enderror"
                    placeholder="Enter your full name"
                />
                @error('name')
                <small id="helpId" class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Email</label>
                <input
                    type="email"
                    name="email"
                    class="form-control @error('email') is-invalid @enderror"
                    placeholder="Enter your email"
                />
                @error('email')
                <small id="helpId" class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Password</label>
                <input
                    type="password"
                    name="password"
                    class="form-control @error('password') is-invalid @enderror"
                    placeholder="Enter your password"
                />
                @error('password')
                <small id="helpId" class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Confirm Password</label>
                <input
                    type="password"
                    name="cpassword"
                    class="form-control @error('cpassword') is-invalid @enderror"
                    placeholder="Confirm your password"
                />
                @error('cpassword')
                <small id="helpId" class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="container">
            <button class="btn btn-primary">Register</button>
             If already register ? <a href="">Login here</a>
            </div>
        </form>
    </div>
</div>
    
@endsection