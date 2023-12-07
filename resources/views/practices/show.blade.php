@extends('layouts.app')

@section('content')

<div>
    <h2>Practice Details</h2>
    <p><strong>Name:</strong> {{ $practice->name }}</p>
    <p><strong>Email:</strong> {{ $practice->email }}</p>
    <p><strong>Website URL:</strong> {{ $practice->website_url }}</p>
    <p><strong>Image:</strong></p>
    @if($practice->images)
        <img src="{{ $practice->images->first()->url }}" alt="Practice Image" style="width: 100px; height: auto;">
    @else
        No Image
    @endif
    <p><strong>Employees: </strong>
        @forelse ($practice->employees as $employee)
            <li>{{ $employee->first_name . ' ' . $employee->last_name }}</li>
        @empty
            No employees
        @endforelse
    </p>
    <p><strong>Fields of practice: </strong>
        @forelse ($practice->fieldsOfPractice as $fieldOfPractice)
            <li>{{ $fieldOfPractice->name }}</li>
        @empty
            No fields of practice
        @endforelse
    </p>
</div>

@endsection