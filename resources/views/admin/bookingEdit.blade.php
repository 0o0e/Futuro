@extends('layouts.admin')

@section('title', 'Boeking Bewerken')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h3>Boeking Bewerken #{{ $booking->id }}</h3>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.bookings.update', $booking->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="form-group mb-3">
                            <label for="name">Naam *</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $booking->name) }}" required>
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="email">Email *</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $booking->email) }}" required>
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="phone">Telefoon</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $booking->phone) }}">
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="date">Datum & Tijd *</label>
                            <input type="datetime-local" class="form-control" id="date" name="date" value="{{ old('date', \Carbon\Carbon::parse($booking->date)->format('Y-m-d\TH:i')) }}" required>
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="guests">Aantal gasten</label>
                            <input type="number" class="form-control" id="guests" name="guests" value="{{ old('guests', $booking->guests) }}" min="1">
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="notes">Notities</label>
                            <textarea class="form-control" id="notes" name="notes" rows="4">{{ old('notes', $booking->notes) }}</textarea>
                        </div>
                        
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.bookings.index') }}" class="btn btn-secondary">Terug</a>
                            <button type="submit" class="btn btn-primary">Opslaan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection