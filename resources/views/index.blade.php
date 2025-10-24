@extends('layouts.app')

@section('content')
    <h1 class="fw-bold mb-3">Welcome to the Students Module</h1>
    <p class="lead text-muted mb-4">Manage student profiles and perform related actions easily.</p>
    <a href="{{ url('/students') }}" class="btn btn-primary btn-lg">Go to Student List</a>
@endsection
