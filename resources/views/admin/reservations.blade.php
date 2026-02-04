@extends('layouts.admin')

@section('title', 'Alle Boekingen')

@section('content')
<div class="container">
    <h1>Alle Boekingen</h1>
    
    <!-- Filter Section -->
    <div class="card mb-4">
        <div class="card-header">
            <h5>Filters</h5>
        </div>
        <div class="card-body">
            <form method="GET" action="{{ route('admin.bookings.index') }}">
                <div class="row">
                    <!-- Status Filter -->
                    <div class="col-md-3">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="">Alle statussen</option>
                            <option value="upcoming" {{ request('status') == 'upcoming' ? 'selected' : '' }}>Komend</option>
                            <option value="today" {{ request('status') == 'today' ? 'selected' : '' }}>Vandaag</option>
                            <option value="past" {{ request('status') == 'past' ? 'selected' : '' }}>Verleden</option>
                        </select>
                    </div>
                    
                    <!-- Year Filter -->
                    <div class="col-md-3">
                        <label for="year">Jaar</label>
                        <select name="year" id="year" class="form-control">
                            <option value="">Alle jaren</option>
                            @for($y = date('Y') - 2; $y <= date('Y') + 2; $y++)
                                <option value="{{ $y }}" {{ request('year') == $y ? 'selected' : '' }}>{{ $y }}</option>
                            @endfor
                        </select>
                    </div>
                    
                    <!-- Quarter Filter -->
                    <div class="col-md-3">
                        <label for="quarter">Kwartaal</label>
                        <select name="quarter" id="quarter" class="form-control">
                            <option value="">Alle kwartalen</option>
                            <option value="1" {{ request('quarter') == '1' ? 'selected' : '' }}>Q1 (Jan-Mrt)</option>
                            <option value="2" {{ request('quarter') == '2' ? 'selected' : '' }}>Q2 (Apr-Jun)</option>
                            <option value="3" {{ request('quarter') == '3' ? 'selected' : '' }}>Q3 (Jul-Sep)</option>
                            <option value="4" {{ request('quarter') == '4' ? 'selected' : '' }}>Q4 (Okt-Dec)</option>
                        </select>
                    </div>
                    
                    <!-- Search Filter -->
                    <div class="col-md-3">
                        <label for="search">Zoeken</label>
                        <input type="text" name="search" id="search" class="form-control" placeholder="Naam of email..." value="{{ request('search') }}">
                    </div>
                </div>
                
                <div class="row mt-3">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Filteren</button>
                        <a href="{{ route('admin.bookings.index') }}" class="btn btn-secondary">Reset</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Statistics Section -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card text-white bg-info">
                <div class="card-body">
                    <h5 class="card-title">Totaal</h5>
                    <h2>{{ $stats['total'] ?? 0 }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <h5 class="card-title">Komend</h5>
                    <h2>{{ $stats['upcoming'] ?? 0 }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-warning">
                <div class="card-body">
                    <h5 class="card-title">Vandaag</h5>
                    <h2>{{ $stats['today'] ?? 0 }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-secondary">
                <div class="card-body">
                    <h5 class="card-title">Verleden</h5>
                    <h2>{{ $stats['past'] ?? 0 }}</h2>
                </div>
            </div>
        </div>
    </div>

    <!-- Bookings by Quarter -->
    @if($bookingsByQuarter && count($bookingsByQuarter) > 0)
        @foreach($bookingsByQuarter as $quarterKey => $quarterBookings)
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">{{ $quarterKey }}</h4>
                    <small>{{ count($quarterBookings) }} reservering(en)</small>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Naam</th>
                                    <th>Email</th>
                                    <th>Telefoon</th>
                                    <th>Datum & Tijd</th>
                                    <th>Status</th>
                                    <th>Acties</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($quarterBookings as $booking)
                                @php
                                    $bookingDate = \Carbon\Carbon::parse($booking->date);
                                    $status = $bookingDate->lt($today) ? 'Verleden' : ($bookingDate->isToday() ? 'Vandaag' : 'Komend');
                                    $rowClass = $bookingDate->lt($today) ? 'table-secondary' : ($bookingDate->isToday() ? 'table-warning' : 'table-success');
                                @endphp
                                <tr class="{{ $rowClass }}">
                                    <td>{{ $booking->id }}</td>
                                    <td>{{ $booking->name }}</td>
                                    <td>{{ $booking->email }}</td>
                                    <td>{{ $booking->phone ?? 'N/A' }}</td>
                                    <td>{{ $bookingDate->format('d-m-Y H:i') }}</td>
                                    <td>
                                        <span class="badge badge-{{ $bookingDate->lt($today) ? 'secondary' : ($bookingDate->isToday() ? 'warning' : 'success') }}">
                                            {{ $status }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.bookings.show', $booking->id) }}" class="btn btn-sm btn-info">Bekijk</a>
                                        <a href="{{ route('admin.bookings.edit', $booking->id) }}" class="btn btn-sm btn-warning">Bewerk</a>
                                        <form action="{{ route('admin.bookings.destroy', $booking->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Weet je zeker dat je deze boeking wilt verwijderen?')">Verwijder</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div class="alert alert-info">
            Geen boekingen gevonden met de geselecteerde filters.
        </div>
    @endif

    <!-- Pagination -->
    @if(isset($bookings) && $bookings->hasPages())
        <div class="d-flex justify-content-center">
            {{ $bookings->appends(request()->query())->links() }}
        </div>
    @endif
</div>

<style>
    .card-header h4 {
        margin: 0;
    }
    
    .table td, .table th {
        vertical-align: middle;
    }
    
    .badge {
        padding: 5px 10px;
        font-size: 12px;
    }
</style>
@endsection