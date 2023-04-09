@extends ("layouts.layout")

@section("head-content")
    <title>Uspesne objednanie</title>
    <link rel="stylesheet" href="{{asset('./styles/objednavka.css')}}">
@endsection

@section("content")
<main class="main-content" id="order">
    <h1>Vaša objednávka č. {{$id}} bola úspešne vytvorená!</h1>
    <p>Na Vašej objednávke začíname pracovať. O jej stave Vás budeme informovať e-mialom.</p>
    <a href="/">Prejsť na hlavnú stránku</a>
</main>
@endsection
