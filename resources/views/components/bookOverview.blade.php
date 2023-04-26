@props(['hover','book'])

<a href="kniha/{{$book->book->id}}">
    @if($hover==true)
    <article class = "grid-item grid-item-3 onMouse"
        onmouseover="changeMainBook({{$book->rating}},
        '{{$book->book->genre->color}}',
        '{{$book->image}}',
        '{{$book->book->title}}',
        '{{$book->authors}}',
        '{{$book->description}}')"
        >
    @else
    <article class="book-component">
    @endif
      <img src="{{asset("$book->image")}}" alt="Kniha {{$book->book->title}}" class="book-img">
      <h3 class="book-title">{{$book->book->title}}</h3>
      <p class="book-author">{{$book->authors}}</p>
          <span class="rating-decimal">
              <span class="fa-solid fa-star"></span>
              <p>{{$book->rating}}</p>
          </span>
          <p class="price"><strong>{{$book->book->price}}<abbr title="EUR">€</abbr></strong></p>
    </article>
</a>
