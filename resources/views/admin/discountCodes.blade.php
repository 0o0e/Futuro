@extends('layouts.admin')

@section('title', 'Kortingscodes')

@section('content')
    <h1>Kortingscodes</h1>
    
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
                            <th>Bedrag</th>
                            <th>Status</th>
                            <th>Gebruikt op</th>
                            <th>Aangemaakt</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($codes as $code)
                            <tr>
                                <td><strong>{{ $code->code }}</strong></td>
                                <td>€{{ number_format($code->amount, 2, ',', '.') }}</td>
                                <td>
                                    @if($code->is_used)
                                        <span class="badge bg-danger">Gebruikt</span>
                                    @else
                                        <span class="badge bg-success">Beschikbaar</span>
                                    @endif
                                </td>
                                <td>
                                    {{ $code->used_at ? $code->used_at->format('d-m-Y H:i') : '-' }}
                                </td>
                                <td>{{ $code->created_at->format('d-m-Y H:i') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Geen kortingscodes gevonden</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                {{ $codes->links() }}
            </div>
        </div>
    </div>
@endsection