@extends ("layouts.orderLayout")


@section("head-content")
  <link rel="stylesheet" href="{{ asset('styles/cart.css')}}">
  <title>Platba - ReadMe BookShop</title>
@endsection

@section('progressbar')
<x-progressbar activated="3" />
@endsection

@section("form-header")
    <form id="finish-form" action="/order/handle" method="POST">
@endsection

@section('form-part-top')
    <article>
        <h1>Osobné údaje</h1>
        <p>{{$orderDelivery->first_name}} {{$orderDelivery->last_name}}</p>
        <p>{{$orderDelivery->email}}</p>
        <p>{{$orderDelivery->phone_number}}</p>
    </article>
    <article>
        <h1>Dodacia adresa</h1>
        <p>{{$orderDelivery->street}}</p>
        <p>{{$orderDelivery->postal_code}}</p>
    </article>
    <article>
        <h1>Spôsob doručenia</h1>
        <p>@switch($orderDelivery->delivery)
            @case('osobne')
            Osobny odber na predajni
                @break
            @case('postou')
            Doručenie na poštu
                @break
            @case('kurierom')
            Doručenie na adresu kurierom
                @break    
        @endswitch</p>
    </article>
@endsection

@section('form-part-bottom')
<fieldset>
    <legend>Spôsob platby</legend>
    <div class="radio-group">
        <input type="radio" id="karta" name="payment-option" value="karta" required>
        <label for="karta">Kartou online</label>
    </div>
    <div class="radio-group">
        <input type="radio" id="dobierka" name="payment-option" value="dobierka">
        <label for="dobierka">Na dobierku</label>
    </div>
    <div class="radio-group">
        <input type="radio" id="gp" name="payment-option" value="googlepay">
        <label for="gp">Google pay</label>
    </div>
    <div class="radio-group">
        <input type="radio" id="prevod" name="payment-option" value="prevod">
        <label for="prevod">Bankovým prevodom</label>
    </div>
</fieldset>
@endsection



@section('form-footer')
<a href="/order/delivery" class="btn cancel">Späť na dopravu</a>
<button class="btn continue" form="finish-form" name="action" value="payment-save">Pokračovať</button>
@endsection