@props(['book','quantity'])

<article>
    <img src="{{$book->image}}" alt="kniha {{$book->book->title}}" width="50" height="80">
    <hgroup >
        <h2>{{$book->book->title}}</h2>
        <h3>{{$book->authors}}</h3>
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
                value="{{$book->book->pivot->quantity}}"
                id="book-{{$book->book->id}}"
                onchange="updateAmount('{{URL::to('/')}}',{{$book->book->id}},this.value)"
                >
            <div class="input-group-prepend">
                <button class="btn" title="pridať produkt">+</button>
            </div>
        </div>
        <button
            class="btn cart-delete"
            title="odstranit z košika"
            name="action"
            value="delete,{{$book->book->id}}"
            ><span class="fa-solid fa-trash"></span></button>
    </div>
    <p data-price="{{$book->book->price}}">{{$book->book->price}} <abbr title="EUR">€</abbr></p>
</article>
