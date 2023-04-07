@props(['hover','book'])
@php
$rating=round(mt_rand()/mt_getrandmax() * 5,2);
$description= str_replace(["\n","\r"], " ",$book->description );
$image=Config::get('constants.IMAGE_DIR') . $book->photos->first()->filename;
$author_str = '';
foreach ($book->authors as $author) {
    $author_str = $author_str . $author->first_name . ' ' . $author->last_name . ', '; 
}
$author_str=rtrim($author_str,', ');
@endphp
<a href="kniha/{{$book->id}}">
    @if($hover==true)
    <article class = "grid-item grid-item-3 onMouse" 
        onmouseover="changeMainBook({{$rating}},
        '{{$book->genre->color}}',
        '{{$image}}',
        '{{$book->title}}',
        '{{$author_str}}',
        '{{$description}}')" 
        >
    @else 
    <article class="book-component">
    @endif
      <img src="{{asset("$image")}}" alt="Kniha {{$book->title}}" class="book-img">
      <h3 class="book-title">{{$book->title}}</h3>
      <p class="book-author">{{$author_str}}</p>
          <span class="rating-decimal">
              <span class="fa-solid fa-star"></span>
              <p>{{$rating}}</p>
          </span>
          <p class="price"><strong>{{$book->price}}<abbr title="EUR">€</abbr></strong></p>
    </article>
</a>