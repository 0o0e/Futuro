@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
    <h1>Dashboard</h1>
    
    <div class="container">
        {{-- Success message --}}
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- Kortingscode Generator --}}
        <div class="card mb-4">
            <div class="card-header">
                <h3>Kortingscode Genereren</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.discount-codes.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="amount" class="form-label">Kortingsbedrag (€)</label>
                        <input 
                            type="number" 
                            class="form-control @error('amount') is-invalid @enderror" 
                            id="amount" 
                            name="amount" 
                            step="0.01" 
                            min="0.01"
                            placeholder="10.00"
                            value="{{ old('amount') }}"
                            required>
                        @error('amount')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Genereer Kortingscode
                    </button>
                </form>
            </div>
        </div>

        {{-- Link naar overzicht --}}
        <div class="mt-3">
            <a href="{{ route('admin.discount-codes.index') }}" class="btn btn-secondary">
                Bekijk Alle Kortingscodes
            </a>
        </div>
    </div>
@endsection