@extends('layout')
@section('content')
    <div class="container col-4">
        <h1 class="mt-3 mb-2 text-center bg-dark text-white rounded">Classroom</h1>
        @if (session()->has('classadd'))
        <div class="alert alert-success text-center">{{ session()->get('classadd') }}</div>
        @endif
        @if (session()->has('classupdate'))
        <div class="alert alert-success text-center">{{ session()->get('classupdate') }}</div>
        @endif
        <div class="card p-4">
            <form action="{{ url('/classroom') }}" method="post">
                @csrf
            <div class="mb-3">
                <label for="" class="form-label">Classroom Name</label>
                <input
                    type="text"
                    name="class_name"
                    class="form-control @error('class_name') is-invalid @enderror"
                    placeholder="Enter classroom name"
                />
                @error('class_name') 
                <small id="helpId" class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Description</label>
                <textarea class="form-control" name="class_desc" id="" rows="3"></textarea>
            </div>
            
            <div class="mb-3">
                <label for="" class="form-label">Status</label>
                <select
                    class="form-select form-select-lg"
                    name="status"
                >
                    <option>Select ....</option>
                    <option selected>Active</option>
                    <option>Inactive</option>
                </select>
            </div>
            <button class="btn btn-success ml-3">Add Classroom</button>
            </form>
        </div>
    </div>
@endsection