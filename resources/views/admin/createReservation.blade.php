@extends('layouts.admin')

@section('title', 'Nieuwe Reservering Aanmaken')

@section('content')
<div class="container mt-4" style="max-width: 600px;">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.reservation.store') }}" method="POST" class="p-4 border rounded shadow-sm bg-white">
        @csrf

        <h4 class="mb-3 text-center">Nieuwe Reservering</h4>

        <div class="mb-3">
            <label class="form-label d-block">Service</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="rondvaart" name="service" value="Rondvaart">
                <label class="form-check-label" for="rondvaart">Rondvaart</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="watertaxi" name="service" value="Watertaxi">
                <label class="form-check-label" for="watertaxi">Watertaxi</label>
            </div>
        </div>

        <div class="mb-3">
            <label for="date" class="form-label">Datum</label>
            <input type="date" class="form-control" id="date" name="date" required>
        </div>

        <div class="row">
            <div class="col mb-3">
                <label for="time_start" class="form-label">Begin</label>
                <input type="time" class="form-control" id="time_start" name="time_start" required>
            </div>
            <div class="col mb-3">
                <label for="time_end" class="form-label">Eind</label>
                <input type="time" class="form-control" id="time_end" name="time_end" required>
            </div>
        </div>

        <div class="mb-3">
            <label for="people" class="form-label">Aantal personen</label>
            <input type="text" class="form-control" id="people" name="people" placeholder="Aantal personen">
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Naam</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Naam" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">E-mailadres</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="jij@example.com" required>
        </div>

        <div class="mb-3">
            <label for="comment" class="form-label">Comment</label>
            <textarea class="form-control" id="comment" name="comment" rows="3" placeholder="Eventuele opmerkingen..."></textarea>
        </div>

        <button type="submit" class="btn btn-primary w-100">Stuur Boeking</button>
    </form>
</div>
@endsection
