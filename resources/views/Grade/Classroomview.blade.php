@extends('layout')
@section('content')
<div class="container mt-4">
    <h1 class="mt-3 mb-2 text-center bg-dark text-white rounded">Classroom List</h1>
    <div class="card">
        @if (session()->has('classdelete'))
            <div class="alert alert-danger text-center">{{ session()->get('classdelete') }}</div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>S.n</th>
                    <th>Class Name</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Created Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $n=1;
                @endphp
                @forelse ($classroom as $class )   
                <tr>
                    <td>{{ $n }}</td>
                    <td>{{ $class->class_name }}</td>
                    <td>{{ $class->class_desc }}</td>
                    <td>
                        @if ($class->status=="Active")
                        <span class="badge badge-primary bg-success">Active</span>
                        @else
                        <span class="badge badge-primary bg-danger">Inactive</span>
                        
                        @endif
                    </td>
                    <td>{{ $class->created_at }}</td>
                    <td>
                        <a href="{{ url('/classroom/edit/'.$class->id) }}">
                            <button class="btn btn-primary">Edit</button>
                        </a>
                        <a href="{{ url('/classroom/delete/'.$class->id) }}">
                            <button class="btn btn-danger" onclick="return confirm('Are your sure your want to delete ?')">Delete</button>
                        </a>
                    </td>
                </tr>
                @php
                    $n=$n+1;
                @endphp
                @empty
               <td>No data found</td>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection