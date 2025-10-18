@extends('layouts.admin') {{-- your admin layout --}}

@section('title', 'Alle Boekingen')

@section('content')
<div class="container">
    <h1>Alle Boekingen</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Naam</th>
                <th>Email</th>
                <th>Datum & Tijd</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bookings as $booking)
            @php
                $status = $booking->date < $today ? 'Verleden' : ($booking->date == $today ? 'Vandaag' : 'Komend');
            @endphp
            <tr class="{{ $booking->date < $today ? 'table-secondary' : ($booking->date == $today ? 'table-warning' : 'table-success') }}">
                <td>{{ $booking->id }}</td>
                <td>{{ $booking->name }}</td>
                <td>{{ $booking->email }}</td>
                <td>{{ \Carbon\Carbon::parse($booking->date)->format('d-m-Y H:i') }}</td>
                <td>{{ $status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
