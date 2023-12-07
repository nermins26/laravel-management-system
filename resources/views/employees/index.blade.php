@extends('layouts.app')

@section('content')

<div>
    <a href="{{ route('employees.create') }}">Create New Employee</a>
</div>

<table>
    <thead>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Practice</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($employees as $employee)
            <tr>
                <td>{{ $employee->first_name }}</td>
                <td>{{ $employee->last_name }}</td>
                <td>{{ $employee->email }}</td>
                <td>{{ $employee->phone }}</td>
                <td>{{ $employee->practice->name }}</td>
                @include('layouts.partials.actions', ['data' => $employee, 'route' => 'employees'])
            </tr>
        @empty
            No employees found
        @endforelse
    </tbody>
</table>
{{ $employees->links() }}

@endsection