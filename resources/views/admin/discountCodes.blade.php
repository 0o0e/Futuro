@extends('layouts.admin')

@section('title', 'Kortingscodes')

@section('content')
    <h1>Kortingscodes</h1>
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card mb-4">
            <div class="card-header">
                <h3>Kortingscode Genereren</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.discount-codes.store') }}" method="POST">
                    @csrf
                    
                    {{-- Type selectie --}}
                    <div class="mb-3">
                        <label class="form-label">Type korting</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="type" id="type_fixed" 
                                       value="fixed" {{ old('type', 'fixed') === 'fixed' ? 'checked' : '' }} required>
                                <label class="form-check-label" for="type_fixed">
                                    Vast bedrag (€)
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="type" id="type_percentage" 
                                       value="percentage" {{ old('type') === 'percentage' ? 'checked' : '' }} required>
                                <label class="form-check-label" for="type_percentage">
                                    Percentage (%)
                                </label>
                            </div>
                        </div>
                        @error('type')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Bedrag/Percentage --}}
                    <div class="mb-3">
                        <label for="amount" class="form-label">
                            <span id="amount_label">Kortingsbedrag (€)</span>
                        </label>
                        <input 
                            type="number" 
                            class="form-control @error('amount') is-invalid @enderror" 
                            id="amount" 
                            name="amount" 
                            step="0.01" 
                            min="0.01"
                            max="9999.99"
                            placeholder="10.00"
                            value="{{ old('amount') }}"
                            required>
                        <small class="form-text text-muted" id="amount_hint">
                            Vul een bedrag in tussen €0.01 en €9999.99
                        </small>
                        @error('amount')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Geldigheidsperiode --}}
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="valid_from" class="form-label">Geldig vanaf (optioneel)</label>
                            <input 
                                type="date" 
                                class="form-control @error('valid_from') is-invalid @enderror" 
                                id="valid_from" 
                                name="valid_from"
                                value="{{ old('valid_from') }}">
                            <small class="form-text text-muted">Laat leeg voor onmiddellijk geldig</small>
                            @error('valid_from')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="valid_until" class="form-label">Geldig tot en met (optioneel)</label>
                            <input 
                                type="date" 
                                class="form-control @error('valid_until') is-invalid @enderror" 
                                id="valid_until" 
                                name="valid_until"
                                value="{{ old('valid_until') }}">
                            <small class="form-text text-muted">Laat leeg voor onbeperkt geldig</small>
                            @error('valid_until')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        Genereer Kortingscode
                    </button>
                </form>
            </div>
        </div>

    </div>
    <div class="container">
        <div class="mb-3">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">← Terug naar Dashboard</a>
        </div>

        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Code</th>
                            <th>Type</th>
                            <th>Waarde</th>
                            <th>Geldig van</th>
                            <th>Geldig tot</th>
                            <th>Status</th>
                            <th>Gebruikt op</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($codes as $code)
                            <tr>
                                <td><strong>{{ $code->code }}</strong></td>
                                <td>
                                    @if($code->type === 'percentage')
                                        <span class="badge bg-info">Percentage</span>
                                    @else
                                        <span class="badge bg-secondary">Vast bedrag</span>
                                    @endif
                                </td>
                                <td>
                                    @if($code->type === 'percentage')
                                        {{ $code->amount }}%
                                    @else
                                        €{{ number_format($code->amount, 2, ',', '.') }}
                                    @endif
                                </td>
                                <td>{{ $code->valid_from ? $code->valid_from->format('d-m-Y') : '-' }}</td>
                                <td>{{ $code->valid_until ? $code->valid_until->format('d-m-Y') : '-' }}</td>
                                <td>
                                    @if($code->is_used)
                                        <span class="badge bg-danger">Gebruikt</span>
                                    @elseif($code->valid_from && now()->lt($code->valid_from))
                                        <span class="badge bg-info">Nog niet actief</span>
                                    @elseif($code->valid_until && now()->gt($code->valid_until))
                                        <span class="badge bg-warning">Verlopen</span>
                                    @else
                                        <span class="badge bg-success">Actief</span>
                                    @endif
                                </td>
                                <td>
                                    {{ $code->used_at ? $code->used_at->format('d-m-Y H:i') : '-' }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">Geen kortingscodes gevonden</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                {{ $codes->links() }}
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const typeFixed = document.getElementById('type_fixed');
            const typePercentage = document.getElementById('type_percentage');
            const amountLabel = document.getElementById('amount_label');
            const amountHint = document.getElementById('amount_hint');
            const amountInput = document.getElementById('amount');

            function updateLabels() {
                if (typePercentage.checked) {
                    amountLabel.textContent = 'Kortingspercentage (%)';
                    amountHint.textContent = 'Vul een percentage in tussen 0.01 en 100';
                    amountInput.max = '100';
                    amountInput.placeholder = '10';
                } else {
                    amountLabel.textContent = 'Kortingsbedrag (€)';
                    amountHint.textContent = 'Vul een bedrag in tussen €0.01 en €9999.99';
                    amountInput.max = '9999.99';
                    amountInput.placeholder = '10.00';
                }
            }

            typeFixed.addEventListener('change', updateLabels);
            typePercentage.addEventListener('change', updateLabels);
            
            updateLabels(); // Initial call
        });
    </script>
@endsection