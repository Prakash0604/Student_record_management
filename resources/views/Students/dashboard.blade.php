@extends('layout')
@section('content')
<div class="container mt-3 col-4">
    <h1 class="text-center">Dashboard</h1>
    @if (session()->has('success'))
    <div class="alert alert-success text-center">
        {{ session()->get('success') }}
    </div> 
    @endif
    <div class="card p-3 text-center bg-secondary text-white">
        <h5>Active Student : {{ $studentcount }}</h5>
        <h5>Inactive Student : {{ $inactivestudent }}</h5>
        <h5>Total Student : {{ $totalstu }}</h5>
    </div>
     <div class="card p-3 mt-3 text-center bg-secondary text-white">
        <h5>Active Classes : {{ $activeclass }}</h5>
        <h5>Inactive Classes : {{ $inactiveclass }}</h5>
        <h5>Total Class : {{ $totalclass }}</h5>
    </div>
</div>
    
@endsection