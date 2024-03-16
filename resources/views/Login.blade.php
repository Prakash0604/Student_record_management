@extends('layout')
@section('content')
<div class="container col-4 mt-3">
    <h1 class="text-center bg-dark text-white rounded mt-2 mb-2">Login Now</h1>
    <div class="card p-3">
        @if (session()->has('verification'))
        <div class="alert alert-success text-center">{{ session()->get('verification') }}</div>
       @endif
        @if (session()->has('message'))
        <div class="alert alert-danger text-center">{{ session()->get('message') }}</div>
       @endif
        <form action="{{ url('/login') }}" method="post">
            @csrf
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
            <div class="container">
            <button class="btn btn-primary">Login</button>
             If not register ? <a href="{{ url('/register') }}">Register now</a>
            </div>
        </form>
    </div>
</div>
    
@endsection