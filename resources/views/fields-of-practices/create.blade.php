@extends('layouts.app')

@section('content')

@include('fields-of-practices.partials.field-of-practice-form', ['create' => true])

@endsection