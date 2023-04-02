@props(['book'])
@php
$rating=round(mt_rand()/mt_getrandmax() * 5,2);
$author_str = '';
$description= str_replace(["\n","\r"], " ",$book->description );
$image=Config::get('constants.IMAGE_DIR') . $book->photos->first()->filename;
foreach ($book->authors as $author) {
    $author_str = $author_str . $author->first_name . ' ' . $author->last_name . ', '; 
}
$author_str=rtrim($author_str,', ');

@endphp

<article class="col-md-6 col-sm-12">
    <a href="book_profile.html/{{$book->id}}">
        <div class="product-container">
            <img src="{{$image}}" alt="Kniha {{$book->title}}" class="product-img">
            <hgroup>
                <h2>{{$book->title}}</h2>
                <h3>{{$author_str}}</h3>
                <p class="product-about">{{$description}}</p>
            </hgroup>
            <span class="rating-decimal">
                <span class="fa-solid fa-star"></span>
                <p>{{$rating}}</p>
            </span>
            <p class="product-price"><strong>{{$book->price}}<abbr title="EUR">€</abbr></strong></p>
            <form>
                <input type="hidden" name="{{$book->id}}" value="{{$book->price}}">
                <button class="btn to-cart">Do košíka</button>
            </form>
        </div>
    </a>
</article>