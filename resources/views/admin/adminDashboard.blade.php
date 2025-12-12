@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
    <h1>Dashboard</h1>

    <div class="container">
        {{-- Success message --}}
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif


    @endsection
