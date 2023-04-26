@props(['book'])

<article class="col-md-6 col-sm-12">
    <a href="kniha/{{$book->book->id}}">
        <div class="product-container">
            <img src="{{asset("$book->image")}}" alt="Kniha {{$book->book->title}}" class="product-img">
            <hgroup>
                <h2>{{$book->book->title}}</h2>
                <h3>{{$book->authors}}</h3>
                <p class="product-about">{{$book->description}}</p>
            </hgroup>
            <span class="rating-decimal">
                <span class="fa-solid fa-star"></span>
                <p>{{$book->rating}}</p>
            </span>
            <p class="product-price"><strong>{{$book->book->price}}<abbr title="EUR">€</abbr></strong></p>
            <form action="/cart/add" method="POST">
                @csrf
                <input type="hidden" id="book_id" name="book_id" value="{{$book->book->id}}">
                <input type="hidden" name="amount" value="1">
                <button class="btn to-cart">Do košíka</button>
            </form>
        </div>
    </a>
</article>
