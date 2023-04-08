@props(['cart']);
@php
$price=0;
foreach ($cart as $book) {
    $price+=$book->price*$book->pivot->quantity;
}

@endphp
<section class="col-xl-3 col-lg-4 col-md-5 form-part" id="order-review">
    <h1>Prehľad objednávky</h1>
    <div>
       @foreach($cart as $book)
        <x-orderReviewItem :book="$book" />
       @endforeach
    </div>
    <footer>
        <p>Spolu <strong>{{$price}} <abbr title="EUR">€</abbr></strong></p>
    </footer>
</section>