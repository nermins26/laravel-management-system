@extends('layouts.app')

@section('content')

@include('employees.partials.employee-form', ['edit' => true])

@endsection