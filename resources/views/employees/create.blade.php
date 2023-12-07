@extends('layouts.app')

@section('content')

@include('employees.partials.employee-form', ['create' => true])

@endsection