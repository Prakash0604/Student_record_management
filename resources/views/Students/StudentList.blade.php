@extends('layout')
@section('content')
    <div class="container">
        <div class="card p-2">
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
                        <td>{{ $student->status }}</td>
                        <td>
                          <a href="" type="button" class="btn btn-primary">View Detail</a>
                          <a href="" type="button" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete ?')">Delete</a>
                        </td>
                    </tr>
                    @php
                        $n=$n+1
                    @endphp
                    @empty
                    <tr>
                        No Data found
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection