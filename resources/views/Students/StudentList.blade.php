@extends('layout')
@section('content')
    <div class="container">
        <h1 class="text-center mt-2 mb-2 bg-dark text-white rounded">Student List</h1>
        <div class="card p-2">
            @if (session()->has('stuupdate'))
                <div class="alert alert-success text-center">{{ session()->get('stuupdate') }}</div>
            @endif
            @if (session()->has('delete'))
                <div class="alert alert-danger text-center">{{ session()->get('delete') }}</div>
            @endif
            <table class="table table-bordered">
                <thead class="thead bg-dark">
                    <tr>
                        <th>S.N</th>
                        <th>Student Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $n=1;
                    @endphp
                    @forelse ($students as $student )
                    <tr>
                        <td> {{ $n }}</td>
                        <td>{{ $student->stu_name }}</td>
                        <td>{{ $student->stu_email }}</td>
                        <td>{{ $student->stud_address }}</td>
                        <td>@if($student->status=='Active')
                            <span class="badge badge-pill bg-success">Active</span>
                            @else
                            <span class="badge badge-pill bg-danger">Inactive</span>
                            @endif
                             </td>
                        <td>
                          <a href="{{ url('/student/detail/'.$student->id) }}" type="button" class="btn btn-primary">View Detail</a>
                          <a href="{{ url('/student/delete/'.$student->id) }}" type="button" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete ?')">Delete</a>
                        </td>
                    </tr>
                    @php
                        $n=$n+1
                    @endphp
                    @empty
                    <tr>
                        <td></td>
                        <td></td>
                    <td class="text-center" >
                        No Data found
                    </td>
                   </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection