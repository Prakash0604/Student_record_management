@extends('layout')
@section('content')
    <div class="container mt-3">
        <h1 class="text-center mt-2 mb-2 bg-dark text-white rounded">Student Add</h1>
        <div class="card p-3">
            @if (session()->has('stuadd'))
                <div class="alert alert-success text-center">{{ session()->get('stuadd') }}</div>
            @endif
            <form action="{{ url('/student/add') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
            <div class="col-md-4">
                <label for="" class="form-label">Student Name</label>
                <input
                    type="text"
                    name="stu_name"
                    class="form-control @error('stu_name') is-invalid @enderror"
                    placeholder=""
                    value="{{ old('stu_name') }}"
                />
                @error('stu_name')  
                <small id="helpId" class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="" class="form-label">Email</label>
                <input
                    type="email"
                    name="stu_email"
                    class="form-control @error('stu_email') is-invalid @enderror"
                    placeholder=""
                    value="{{ old('stu_email') }}"
                />
                @error('stu_email')  
                <small id="helpId" class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="" class="form-label">Address</label>
                <input
                    type="text"
                    name="stu_address"
                    class="form-control @error('stu_address') is-invalid @enderror"
                    placeholder=""
                    value="{{ old('stu_address') }}"
                />
                @error('stu_address')  
                <small id="helpId" class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <label for="" class="form-label">Contact Number</label>
                    <input
                        type="number"
                        name="stu_contact"
                        value="{{ old('stu_contact') }}"
                        class="form-control @error('stu_contact') is-invalid @enderror"
                    />
                    @error('stu_contact')
                    <small id="helpId" class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label for="" class="form-label">Gender</label>
                    <select
                        class="form-select @error('gender') is-invalid @enderror"
                        name="gender"
                        id=""
                    >
                        <option></option>
                        <option>Male</option>
                        <option>Female</option>
                        <option>Others</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="" class="form-label">Date of Birth</label>
                    <input
                        type="date"
                        name="stu_dob"
                        value="{{ old('stu_dob') }}"
                        class="form-control @error('stu_dob') is-invalid @enderror"
                    />
                    @error('stu_dob')
                    <small id="helpId" class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label for="" class="form-label">Profile</label>
                    <input
                        type="file"
                        name="stu_profile"
                        class="form-control @error('stu_profile') is-invalid @enderror"
                    />
                    @error('stu_profile')
                    <small id="helpId" class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="" class="form-label">Enroll Class</label>
                    <select
                        class="form-select"
                        name="stu_class"
                        id=""
                    >
                        <option>Select one</option>
                        @foreach ($classroom as $class ) 
                        @if ($class->status=="Active")     
                        <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <div class=" col-md-6">
                    <label for="" class="form-label">Status</label>
                    <select
                        class="form-select"
                        name="status"
                        id=""
                    >
                        <option></option>
                        <option>Active</option>
                        <option>Inactive</option>
                    </select>
                </div>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Description</label>
                <textarea class="form-control" name="stu_desc" id="" rows="3">{{ old('stu_desc') }}</textarea>
            </div>
            <button class="btn btn-primary mt-3">Add Student</button>
            </form>
        </div>
    </div>
@endsection