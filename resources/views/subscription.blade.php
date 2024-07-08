@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Suscríbete a un Plan</h1>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Plan Mensual</h5>
                    <p class="card-text">Precio: S/. 70.99</p>
                    <form action="{{ route('subscription.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="plan" value="monthly">
                        <button type="submit" class="btn btn-primary">Pagar</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Plan Anual</h5>
                    <p class="card-text">Precio: S/. 850.99</p>
                    <form action="{{ route('subscription.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="plan" value="annual">
                        <button type="submit" class="btn btn-primary">Pagar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
