@extends('layouts.admin')

@section('title', 'Boeking Bewerken')

@section('content')
    <div class="container">
        <h1>Boeking Bewerken</h1>

        <form method="POST" action="{{ route('admin.reservations.update', $booking->id) }}">

            @csrf

            <div class="mb-3">
                <label>Naam</label>
                <input type="text" name="name" value="{{ old('name', $booking->name) }}" class="form-control">
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" value="{{ old('email', $booking->email) }}" class="form-control">
            </div>

            <div class="mb-3">
                <label>Service</label>
                <input type="text" name="service" value="{{ old('service', $booking->service) }}" class="form-control">
            </div>

            <div class="mb-3">
                <label>Datum</label>
                <input type="date" name="date" value="{{ old('date', $booking->date) }}" class="form-control">
            </div>

            <div class="mb-3">
                <label>Starttijd</label>
                <input type="time" name="time_start" value="{{ old('time_start', $booking->time_start) }}"
                    class="form-control">
            </div>

            <div class="mb-3">
                <label>Eindtijd</label>
                <input type="time" name="time_end" value="{{ old('time_end', $booking->time_end) }}"
                    class="form-control">
            </div>

            <div class="mb-3">
                <label>Aantal Personen</label>
                <input type="number" name="people" value="{{ old('people', $booking->people) }}" class="form-control">
            </div>



            <div class="mb-3">
                <label>Opmerkingen</label>
                <textarea name="comment" class="form-control">{{ old('comment', $booking->comment) }}</textarea>
            </div>

            <h4>Arrangement</h4>
            @foreach (['prosecco', 'picnic', 'olala', 'bistro', 'barca'] as $arr)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="{{ $arr }}" value="1"
                        {{ old($arr, $booking->arrangement->$arr ?? 0) ? 'checked' : '' }}>
                    <label class="form-check-label">{{ ucfirst($arr) }}</label>
                </div>
            @endforeach

            @if ($booking->invoice)
                <div class="mb-3 mt-4">
                    <label>Factuurstatus</label>
                    <select name="invoice_status" class="form-select">
                        <option value="onbetaald" {{ $booking->invoice->status === 'onbetaald' ? 'selected' : '' }}>
                            Onbetaald</option>
                        <option value="betaald" {{ $booking->invoice->status === 'betaald' ? 'selected' : '' }}>Betaald
                        </option>
                    </select>
                    <div class="mb-3 mt-3">
                        <label>Betaalmethode</label>
                        <select name="payment_method" class="form-select">
                            <option value="">-- Kies betaalmethode --</option>
                            <option value="cash" {{ $booking->invoice->payment_method === 'cash' ? 'selected' : '' }}>
                                Contant (Cash)
                            </option>
                            <option value="pin" {{ $booking->invoice->payment_method === 'pin' ? 'selected' : '' }}>
                                Pin
                            </option>
                            <option value="online" {{ $booking->invoice->payment_method === 'online' ? 'selected' : '' }}>
                                Online
                            </option>
                        </select>
                    </div>


                </div>
            @endif

            <button type="submit" class="btn btn-primary">Opslaan</button>
            <a href="{{ route('admin.reservations') }}" class="btn btn-secondary">Annuleren</a>
        </form>
    </div>
@endsection
