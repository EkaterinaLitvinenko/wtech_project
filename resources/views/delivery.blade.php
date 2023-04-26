@extends ("layouts.orderLayout")

@section("head-content")
  <link rel="stylesheet" href="{{ asset('styles/cart.css')}}">
  <title>Doprava - ReadMe BookShop</title>
@endsection

@section('progressbar')
<x-progressbar activated="2" />
@endsection

@section("form-header")
    <form id="delivery-form" action="/order/handle" method="POST">
@endsection

@section('form-part-top')
            <fieldset>
                <legend>Osobné Udaje</legend>
                <div class="form-row">
                <div class="form-group col">
                    <label for="first-name">Meno</label>
                    <input class="form-control" type="text" name="first-name" required>
                </div>
                <div class="form-group col">
                    <label for="last-name">Priezvisko</label>
                    <input class="form-control" type="text" name="last-name"required>
                </div>
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input class="form-control" type="text" name="email" required>
                </div>
                <div class="form-group">
                    <label for="phone">Telefónne číslo</label>
                    <input class="form-control" type="text" name="phone" required>
                </div>
            </fieldset>
            <fieldset>
                <legend>Dodacia Adresa</legend>
                <div class="row form-group">
                    <div class="col col-8">
                        <label for="street">Ulica a číslo domu</label>
                        <input class="form-control" type="text" name="street" required>
                    </div>
                    <div class="col col-4">
                        <label for="postal-code">PSČ</label>
                        <input class="form-control" type="text" name="postal-code" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-3 ">
                    </div>

                </div>
            </fieldset>
@endsection

@section('form-part-bottom')
            <fieldset >
                <legend>Spôsob doručenia</legend>
                <div class="radio-group">
                    <input type="radio" id="odber" name="delivery-option" value="osobne" required>
                    <label for="postou">Osobny odber na predajni</label>
                </div>
                <div class="radio-group">
                    <input type="radio" id="posta" name="delivery-option" value="postou">
                    <label for="posta">Doručenie na poštu</label>
                </div>
                <div class="radio-group">
                    <input type="radio" id="kurier" name="delivery-option" value="kurierom">
                    <label for="kurier">Doručenie na adresu kurierom</label>
                </div>
            </fieldset>
@endsection



@section('form-footer')
<a href="/cart" class="btn cancel">Spät na dopravu</a>
<button class="btn continue" form="delivery-form" name="action" value="delivery-save">Pokračovať</button>
@endsection
