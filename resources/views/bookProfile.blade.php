@extends ("layouts.layout")

@section("head-content")
  <title>Kniha: {{$book->title}}</title>
  <link rel="stylesheet" href="{{ asset('extern/owlcarousel/assets/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{ asset('extern/owlcarousel/assets/owl.theme.default.min.css') }}">

  <link rel="stylesheet" href="{{ asset('styles/book_profile.css') }}">
@endsection

@section("content")
  <main>
    <article class="main-content">
        <section id="book-info1">
            <div id="upper-info" style="background-color: {{$book->genre->color}};">
                <div>
                    <img src="{{ asset('res/knihy/' . $cover) }}" id="main-cover" alt="Obálka knihy: {{$book->title}}">
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
                  <h2>{{$authors}}</h2>

                  <span id="inline-rating-decimal">
                    <span id="rating-inline" class="rating" style="--stars-width: {{123*($rating/5.0)}}px"></span>
                    <p>{{$rating}}</p>
                  </span>

                  <p id="mini-about">
                    {{$description}}
                  </p>
                  <a href="#main-about" id="read-more">Čítať viac<span class="fa-solid fa-arrow-down"></span></a>
                </hgroup>

                <form id="quantity-cart" action="/cart/add" method="POST">
                    <p><strong>{{$book->price}}<abbr title="EUR">€</abbr></strong><p>
                    <div class="input-group amount-input">
                        <div class="input-group-append">
                            <button class="btn input-group-text" title="odobrať produkt">-</button>
                        </div>
                        <input class="form-control" type="number" name="amount" value="1">
                        <div class="input-group-prepend">
                            <button class="btn" title="pridať produkt">+</button>
                        </div>
                    </div>
                    <input type="hidden" id="book_id" name="book_id" value="{{$book->id}}">
                    @csrf
                    <button type="submit" form="quantity-cart" class="btn btn-lg to-cart">Pridať do košíka  </button>
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
                        @elseif ($book->type == "brozovana")
                            <td>Brožovaná väzba</td>
                        @elseif ($book->type == "ekniha")
                            <td>eKniha</td>
                        @elseif ($book->type == "audiokniha")
                            <td>Audiokniha</td>
                        @else
                            <td></td>
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
  </main>
@endsection

@section("scripts-content")
  <script src="{{ asset('js/book_profile.js')}}"></script>
  <script src="{{ asset('extern/owlcarousel/owl.carousel.min.js')}}"></script>
@endsection
