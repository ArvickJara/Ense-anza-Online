@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Suscripción</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(isset($remainingDays))
        <div class="alert alert-info">
            <h2>Contador regresivo</h2>
            <p>Tu suscripción expirará en {{ $remainingDays }} días.</p>
        </div>
    @else
        <form action="{{ route('subscription.subscribe') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="plan">Elige un plan:</label>
                <select name="plan" id="plan" class="form-control">
                    <option value="monthly">Mensual - S/. 70.99</option>
                    <option value="annual">Anual - S/. 850.99</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Suscribirse</button>
        </form>
    @endif
</div>
@endsection