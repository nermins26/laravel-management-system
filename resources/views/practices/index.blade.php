@extends('layouts.app')

@section('content')

<a href="{{ route('practices.create') }}">Create New Practice</a>

<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Website URL</th>
            <th>Image</th>
            <th>Employees</th>
            <th>Fields of Practice</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($practices as $practice)
            <tr>
                <td>{{ $practice->name }}</td>
                <td>{{ $practice->email }}</td>
                <td>{{ $practice->website_url }}</td>
                <td>
                    @if($practice->images)
                        <img src="{{ $practice->images->first()->url }}" alt="Practice Image" style="width: 100px; height: auto;">
                    @else
                        No Image
                    @endif
                </td>
                <td>
                    @forelse ($practice->employees as $employee)
                        <li>{{ $employee->first_name . ' ' . $employee->last_name }}</li>
                    @empty
                        No employees
                    @endforelse
                </td>
                <td>
                    @forelse ($practice->fieldsOfPractice as $fieldOfPractice)
                        <li>{{ $fieldOfPractice->name }}</li>
                    @empty
                        No fields of practice
                    @endforelse
                </td>
                @include('layouts.partials.actions', ['data' => $practice, 'route' => 'practices'])
            </tr>
        @empty
             No practices found
        @endforelse
    </tbody>
</table>

{{ $practices->links() }}

@endsection
