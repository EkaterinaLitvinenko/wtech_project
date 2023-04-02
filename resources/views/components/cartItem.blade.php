@props(['book','quantity'])
@php
$image=Config::get('constants.IMAGE_DIR') . $book->photos->first()->filename;
$author_str = '';
foreach ($book->authors as $author) {
    $author_str = $author_str . $author->first_name . ' ' . $author->last_name . ', '; 
}
$author_str=rtrim($author_str,', ');
@endphp
<article>
    <img src="{{$image}}" alt="kniha {{$book->title}}" width="50" height="70">
    <hgroup >
        <h2>{{$book->title}}</h2>
        <h3>{{$author_str}}</h3>
    </hgroup>
    <div class="controls">
        <div class="input-group amount-input">
            <div class="input-group-append">
                <button class="btn input-group-text" title="odobrať produkt">-</button>
            </div>
            <input 
                class="form-control"
                type="number"
                min="1"
                value="{{$book->pivot->quantity}}"
                id="book-{{$book->id}}"
                onchange="updateAmount('{{URL::to('/')}}',{{$book->pivot->cart_id}},{{$book->id}},this.value)"
                >
            <div class="input-group-prepend">
                <button class="btn" title="pridať produkt">+</button>
            </div>
        </div>
        <button 
            class="btn cart-delete" 
            title="odstranit z košika"
            name="action"
            value="delete,{{$book->id}}"
            ><span class="fa-solid fa-trash"></span></button>  
    </div>                 
    <p data-price="{{$book->price}}">{{$book->price}} <abbr title="EUR">€</abbr></p>
</article>