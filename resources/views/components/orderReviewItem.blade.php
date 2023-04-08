@props(['book'])
<article>
    <h2>{{$book->title}}</h2>
    
        <p class="amount">{{$book->pivot->quantity}}<abbr title="kusov">ks</abbr></p>
        <p class="price"><strong>{{$book->price*$book->pivot->quantity}} <abbr title="EUR">€</abbr></strong></p>
</article>