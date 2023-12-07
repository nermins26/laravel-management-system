@extends('layouts.app')

@section('content')

<div>
    <a href="{{ route('fields-of-practice.create') }}">Create New Field of Practice</a>
</div>

<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($fieldsOfPractice as $fieldOfPractice)
            <tr>
                <td>{{ $fieldOfPractice->name }}</td>
                @include('layouts.partials.actions', ['data' => $fieldOfPractice, 'route' => 'fields-of-practice'])
            </tr>
        @empty
            No fields of practice found
        @endforelse
    </tbody>
</table>

{{ $fieldsOfPractice->links() }}

@endsection
