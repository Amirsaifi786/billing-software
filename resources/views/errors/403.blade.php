@extends('layouts.master')

@section('title', 'Access Denied')

@section('content')
<div class="text-center mt-5">
    <h1 class="display-1 text-danger">403</h1>
    <h3 class="mb-3">Oops! You don't have permission to access this page.</h3>
    <p>Please contact the administrator if you believe this is a mistake.</p>
    <a href="{{ url('/') }}" class="btn btn-primary">Go Back Home</a>
</div>
@endsection
