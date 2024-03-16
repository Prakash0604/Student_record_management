@extends('layout')
@section('content')
<div class="container mt-3">
    <h1 class="text-center">Dashboard</h1>
    <div class="card p-3">
        <h5>Active Student : {{ $studentcount }}</h5>
        <h5>Total Student : {{ $totalstu }}</h5>
    </div>
     <div class="card p-3 mt-3">
        <h5>Active Classes : {{ $activeclass }}</h5>
        <h5>Total Class : {{ $totalclass }}</h5>
    </div>
</div>
    
@endsection