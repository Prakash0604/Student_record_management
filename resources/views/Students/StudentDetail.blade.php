@extends('layout')
@section('content')
<div class="container mt-3 bg-secondary mb-5">
    <div class="card p-3 bg-dark">
        @if ($studentdetail->stu_profile!=NULL)
        <img src="{{ asset('storage/images/'.$studentdetail->stu_profile) }}" alt="" srcset="" class="rounded d-flex mx-auto" height="400px" width="500px">
        @else
        <img src="{{ asset('storage/images/avtarimage.png') }}" alt="" srcset="" class="rounded d-flex mx-auto" height="400px" width="500px">
        @endif
        <div class="card-head mt-2">
            <h3 class="text-center">{{ $studentdetail->stu_name }}</h3>
            <a href="{{ url('/student/edit/') }}" class="d-flex mx-auto">
                <button class="btn btn-primary d-felx mx-auto mb-2">Edit Detail</button>
            </a>
        </div>
        <div class="card bg-warning">
            <table class="table table-bordered ">
                <tr>
                    <th>Email</th>
                    <td>{{ $studentdetail->stu_email }}</td>
                </tr>  <tr>
                    <th>Address</th>
                    <td>{{ $studentdetail->stud_address }}</td>
                </tr>  <tr>
                    <th>Contact</th>
                    <td>{{ $studentdetail->stu_contact }}</td>
                </tr>  <tr>
                    <th>Gender</th>
                    <td>{{ $studentdetail->gender }}</td>
                </tr>  <tr>
                    <th>Date of Birth</th>
                    <td>{{ $studentdetail->stu_dob }}</td>
                </tr>
                  <tr>
                    <th>Class</th>
                    {{-- @foreach ($classroom as $class )   --}}
                    <td>{{ $classroom->class_name }}</td>
                    {{-- @endforeach --}}
                </tr>
                  <tr>
                    <th>Status</th>
                    <td>@if($studentdetail->status=='Active')
                    <span class="badge badge-pill bg-success">Active</span>
                    @else
                    <span class="badge badge-pill bg-danger">Inactive</span>
                    @endif

                     </td>
                </tr>
            </table>
        </div>
        <div class="card mt-3 bg-secondary text-white mb-4">
            <h2 class="text-center mt-3 text-light">Description</h2>
            <p class="p-2">{{ $studentdetail->stu_desc }}</p>
        </div>
    </div>
</div>
@endsection