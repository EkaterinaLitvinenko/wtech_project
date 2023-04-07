@props(['book'])
@php
$rating=round(mt_rand()/mt_getrandmax() * 5,2);
$author_str = '';
$description= str_replace(["\n","\r"], " ",$book->description );
foreach ($book->authors as $author) {
    $author_str = $author_str . $author->first_name . ' ' . $author->last_name . ', '; 
}
$author_str=rtrim($author_str,', ');

$filenames = [];
$photos = $book->photos;
foreach ($photos as $photo) {
    $filenames[] = $photo->filename;
}

@endphp

<article class="main-content">
    <section id="book-info1">
        <div id="upper-info" style="background-color: {{$book->genre->color}};">
            <div>
                <img src="{{ asset('res/knihy/' . $book->photos->first()->filename) }}" id="main-cover" alt="Obálka knihy: {{$book->title}}">
                <div id="myModal" class="modal">
                  <span class="close">&times;</span>
                  <img class="modal-content" id="img01">
                </div>
                <div class="owl-carousel book-photos">
                    @foreach($filenames as $name)
                      <div><img src="{{ asset('res/knihy/' . $name) }}" onclick="changeImage(this)"></div>
                    @endforeach
                  </div>
            </div>  

            <hgroup>
              <h1>{{$book->title}}</h1>
              <h2>{{$author_str}}</h2>
            
              <span id="inline-rating-decimal">
                <span id="rating-inline" class="rating" style="--stars-width: {{123*($rating/5.0)}}px"></span>
                <p>{{$rating}}</p>
              </span>
              
              <p id="mini-about">
                {{$description}}
              </p>
              <a href="#main-about" id="read-more">Čítať viac<span class="fa-solid fa-arrow-down"></span></a>
            </hgroup>
                          
            <form id="quantity-cart">
                <p><strong>{{$book->price}}<abbr title="EUR">€</abbr></strong><p>
                <div class="input-group amount-input">
                    <div class="input-group-append">
                        <button class="btn input-group-text" title="odobrať produkt">-</button>
                    </div>
                    <input class="form-control" type="number" value="1">
                    <div class="input-group-prepend">
                        <button class="btn" title="pridať produkt">+</button>
                    </div>
                </div>     
                <button type="button" class="btn btn-lg to-cart">Pridať do košíka  </button>
            </form>
        </div>
    </section>

    <section id="book-info2">
        <div id="main-table">
            <table class="table">
                <tbody>
                  <tr>
                    <th scope="row">Počet strán</th>
                    <td>{{$book->page_count}}</td>
                  </tr>
                  <tr>
                    <th scope="row">Žáner</th>
                    <td>{{$book->genre->name}}</td>
                  </tr>
                  <tr>
                    <th scope="row">Jazyk</th>
                    @if($book->language == "slovensky")
                        <td>Slovenský</td>
                    @else
                        <td>Anglický</td>
                    @endif
                  </tr>
                  <tr>
                    <th scope="row">Typ väzby</th>
                    @if($book->type == "pevna")
                        <td>Pevná väzba</td>
                    @else
                        <td>Brožovaná väzba</td>
                    @endif
                  </tr>
                  <tr>
                    <th scope="row">ISBN</th>
                    <td>{{$book->isbn}}</td>
                  </tr>
                </tbody>
              </table>
        </div>  
        <section id="main-about">
            <h1>O knihe</h1>
            <p>
                {{$description}}
            </p>
          </section>
    </section>
</article>