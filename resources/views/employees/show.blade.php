@extends('layouts.app')

@section('content')

<div>
    <h2>Employee Details</h2>
    <p><strong>First Name:</strong> {{ $employee->first_name }}</p>
    <p><strong>Last Name:</strong> {{ $employee->last_name }}</p>
    <p><strong>Email:</strong> {{ $employee->email }}</p>
    <p><strong>Phone:</strong> {{ $employee->phone }}</p>
    <p><strong>Practice:</strong> {{ $employee->practice->name }}</p>
</div>

@endsection