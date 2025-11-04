@include('.includes.navbar')

<style>
    body {
        background: #f1f5f4;
        font-family: 'Inter', sans-serif;
        color: #333;
    }

        * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Verdana', sans-serif;
    }

    body, html {
        height: 100%;
        overflow-x: hidden;
        background-color: var(--white);
        color: var(--text-dark);
    }


    nav {
        background-color: #4C807F;
        margin: -10px;
    }

    .booking-wrapper {
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 85vh;
        padding: 30px 10px;
    }

    .booking-container {
        background: #ffffff;
        border-radius: 16px;
        padding: 40px 35px;
        width: 100%;
        max-width: 450px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
        transition: 0.3s ease;
    }

    h2 {
        color: #355e5c;
        font-weight: 700;
        font-size: 1.8rem;
        text-align: center;
        margin-bottom: 25px;
    }

    label {
        font-weight: 500;
        color: #444;
    }

    input, textarea {
        border: 1.5px solid #d7e2e0;
        border-radius: 10px;
        padding: 10px 12px;
        font-size: 0.95rem;
        width: 100%;
        transition: 0.2s;
    }

    input:focus, textarea:focus {
        outline: none;
        border-color: #4C807F;
        box-shadow: 0 0 0 2px rgba(76, 128, 127, 0.2);
    }

    .btn-primary {
        background-color: #4C807F;
        border: none;
        border-radius: 10px;
        padding: 12px;
        font-weight: 600;
        width: 100%;
        transition: 0.2s;
        font-size: 1rem;
        color: white;
        margin-top: 20px;
    }

    .btn-primary:hover {
        background-color: #3a6665;
    }

    .btn-success {
        background-color: #6d9885;
        border: none;
        border-radius: 10px;
        padding: 12px;
        font-weight: 600;
        width: 100%;
        transition: 0.2s;
        font-size: 1rem;
        color: white;
        margin-top: 20px;
    }

    .btn-success:hover {
        background-color: #327857;
    }

    .info {
        background: #f7faf9;
        border-radius: 10px;
        padding: 12px 15px;
        margin-bottom: 10px;
        font-size: 0.95rem;
    }

    .info strong {
        color: #355e5c;
    }

    hr {
        margin: 30px 0;
        border: 0;
        border-top: 1px solid #e0e0e0;
    }

    .alert {
        border-radius: 10px;
        font-size: 0.9rem;
    }
</style>

<div class="booking-wrapper">
    <div class="booking-container">

        <h2>Bekijk je boeking</h2>

        @if(!isset($booking))
            <form method="POST" action="{{ route('client.show') }}">
                @csrf
                <div class="mb-3">
                    <label>Factuurnummer</label>
                    <input type="text" name="invoice_number" placeholder="Bijv. INV-690802BADBBE2" required>
                </div>
                <div class="mb-3">
                    <label>E-mailadres</label>
                    <input type="email" name="email" placeholder="jouw@email.com" required>
                </div>

                @error('error')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror

                <button type="submit" class="btn btn-primary mt-3">Bekijk mijn boeking</button>
            </form>

        @else
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="info"><strong>Naam:</strong> {{ $booking->name }}</div>
            <div class="info"><strong>Email:</strong> {{ $booking->email }}</div>
            <div class="info"><strong>Datum:</strong> {{ $booking->date }}</div>
            <div class="info"><strong>Tijd:</strong> {{ $booking->time_start }} - {{ $booking->time_end ?? 'N.v.t.' }}</div>
            <div class="info"><strong>Prijs:</strong> €{{ number_format($booking->price, 2, ',', '.') }}</div>
            <div class="info"><strong>Factuurnummer:</strong> {{ $booking->invoice->invoice_number ?? 'Geen factuur' }}</div>

            <hr>

            <form method="POST" action="{{ route('client.update', $booking->id) }}">
                @csrf
                <div class="mb-3">
                    <label>Telefoonnummer</label>
                    <input type="text" name="phone" value="{{ $booking->phone }}">
                </div>
                <div class="mb-3">
                    <label>Aantal personen</label>
                    <input type="number" name="people" value="{{ $booking->people }}">
                </div>
                <div class="mb-3">
                    <label>Opmerking</label>
                    <textarea name="comment" rows="3">{{ $booking->comment }}</textarea>
                </div>

                <button type="submit" class="btn btn-success mt-2">Wijzigingen opslaan</button>
            </form>
        @endif

    </div>
</div>

@include('.includes.footer')
