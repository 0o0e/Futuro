@extends('layouts.admin')

@section('title', 'Boeking Details')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3>Boeking Details #{{ $booking->id }}</h3>
                    @php
                        $bookingDate = \Carbon\Carbon::parse($booking->date);
                        $today = \Carbon\Carbon::today();
                        $status = $bookingDate->lt($today) ? 'Verleden' : ($bookingDate->isToday() ? 'Vandaag' : 'Komend');
                        $badgeClass = $bookingDate->lt($today) ? 'secondary' : ($bookingDate->isToday() ? 'warning' : 'success');
                    @endphp
                    <span class="badge badge-{{ $badgeClass }}">{{ $status }}</span>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-4"><strong>Naam:</strong></div>
                        <div class="col-md-8">{{ $booking->name }}</div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-md-4"><strong>Email:</strong></div>
                        <div class="col-md-8">
                            <a href="mailto:{{ $booking->email }}">{{ $booking->email }}</a>
                        </div>
                    </div>
                    
                    @if($booking->phone)
                    <div class="row mb-3">
                        <div class="col-md-4"><strong>Telefoon:</strong></div>
                        <div class="col-md-8">
                            <a href="tel:{{ $booking->phone }}">{{ $booking->phone }}</a>
                        </div>
                    </div>
                    @endif
                    
                    <div class="row mb-3">
                        <div class="col-md-4"><strong>Datum & Tijd:</strong></div>
                        <div class="col-md-8">{{ $bookingDate->format('d-m-Y H:i') }}</div>
                    </div>
                    
                    @if(isset($booking->guests))
                    <div class="row mb-3">
                        <div class="col-md-4"><strong>Aantal gasten:</strong></div>
                        <div class="col-md-8">{{ $booking->guests }}</div>
                    </div>
                    @endif
                    
                    @if($booking->notes)
                    <div class="row mb-3">
                        <div class="col-md-4"><strong>Notities:</strong></div>
                        <div class="col-md-8">{{ $booking->notes }}</div>
                    </div>
                    @endif
                    
                    <div class="row mb-3">
                        <div class="col-md-4"><strong>Aangemaakt op:</strong></div>
                        <div class="col-md-8">{{ $booking->created_at->format('d-m-Y H:i') }}</div>
                    </div>
                    
                    <hr>
                    
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.bookings.index') }}" class="btn btn-secondary">Terug naar overzicht</a>
                        <div>
                            <a href="{{ route('admin.bookings.edit', $booking->id) }}" class="btn btn-warning">Bewerk</a>
                            <form action="{{ route('admin.bookings.destroy', $booking->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Weet je zeker dat je deze boeking wilt verwijderen?')">Verwijder</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection