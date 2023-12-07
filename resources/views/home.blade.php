@extends('layouts.app')

@section('content')

    <a style="padding-right: 16px" href="{{ route('employees.index') }}">View Employees</a>

    <a style="padding-right: 16px" href="{{ route('practices.index') }}">View Practices</a>

    <a style="padding-right: 16px" href="{{ route('fields-of-practice.index') }}">View Fields of Practice</a>

@endsection

