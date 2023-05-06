@props(['book'])

<article class="book-product">
    <img class="book-cover" src="{{asset("$book->image")}}">
    <h2 class="book-title">{{$book->book->title}}</h2>
    <p class="book-author">{{$book->authors}}</p>
    <p class="book-genre">{{$book->book->genre->name}}</p>
    <p class="book-price">{{$book->book->price}}€</p>
    <div class="action-btn">
        <a href="/admin/edit/{{$book->book->id}}" class="edit-btn"><span class="fa-solid fa-pen-to-square"></span></a>
        <button
            class="btn cart-delete"
            title="odstranit z košika"
            name="action"
            value="delete,{{$book->book->id}}"
            ><span class="fa-solid fa-trash"></span></button>
    </div>
</article>

