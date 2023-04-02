@extends ("layouts.layout")

@php
auth()->attempt([
  "email"=>'xdickens@example.com',
  "password"=>'password'
])
@endphp

@section("head-content")
  <title>ReadMe BookShop</title>
  <link rel="stylesheet" href="./extern/owlcarousel/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="./extern/owlcarousel/assets/owl.theme.default.min.css">
  <link rel="stylesheet" href="./styles/homescreen.css">
@endsection
        

@section("content")
  <main>
        <!--banner-->
        <header id="banner" class="main-content">
          <picture>
            <source srcset="./res/banner-600w.png" media="(max-width:500px)">
            <source srcset="./res/banner-1000w.png" media="(max-width:1000px)">
            <source srcset="./res/banner-1224w.png" media="(max-width:1250px)">
            <img src="./res/banner-1300w.png" 
                  alt="Banner stránky - reklama na knihu Slepá vŕba a spiaca žena od Haruki Murakami">
          </picture>
        </header>
        <!--odporučame - corousel-->
        <section class="main-content">
            <h1>Odporúčame Vám...</h1>
            <div class="owl-carousel homescreen">
                @foreach($books as $book)
                <x-bookOverview :hover="FALSE" :book="$book"/>
                @endforeach
            </div>
        </section
        <!--žánre-->
        <section class="main-content">
            <hr>
            <h1>Objavte Váš obľúbený žáner...</h1>
            <div class="container">
                <div class="row">
                  <div class="col zoom">
                    <a href="{{ route('catalog', ['genre' => 'Detektívky']) }}">
                      <img src="./res/detective.svg" alt="obrázok lupy s odtlačkom prsta reprezentujúci žáner detektívky"">
                      <h2>Detektívky</h2>
                    </a>
                  </div>
                  <div class="col zoom">
                    <img src="./res/horor.svg" alt="obrázok ducha reprezentujúci žáner trilery a horory"">
                    <h2>Trilery a Horory</h2>
                  </div>
                  <div class="col zoom">
                    <img src="./res/scifi.svg" alt="obrázok ufa reprezentujúci žáner sci-fi">
                    <h2>Sci-fi</h2>
                  </div>
                  <div class="col zoom">
                    <img src="./res/fantasy.svg" alt="obrázok kúzelníckého klobúku reprezentujúci žáner fantasy">
                    <h2>Fantasy</h2>
                  </div>
                  <div class="col zoom">
                    <img src="./res/romantic.svg" alt="obrázok ruže reprezentujúci žáner romantické knihy">
                    <h2>Romantika</h2>
                  </div>
                  <div class="col zoom">
                    <img src="./res/kids.svg" alt="obrázok medvedíka reprezentujúci knihy pre deti">
                    <h2>Knihy pre deti</h2>
                  </div>
                </div>
            </div>
            <hr>
        </section
        <!--top knihy-->
        <section class="main-content" id="topBooks">
          <h1>TOP 6 kníh podľa našich zákazníkov...</h1>
          <div class="grid-container">
            <div class="grid-item grid-item-1">
              <article id="main-book">
                <img src="./res/knihy/dobreznamenia_1.jpg" alt="Kniha Dobré znamenia" id="main-book-cover">
                <h2 id="main-book-title">Dobré znamenia</h2>
                <p id="main-book-author">Neil Gaiman, Terry Pratchett</p>
                <span id="rating-inline" class="rating"></span>
                <p id="main-book-about">
                    Koniec sveta sa nezadržateľne blíži. Zhromažďujú sa armády dobra a zla, z hlbín sa dvíha Atlantída, z neba padajú žaby, naplno horia vášne. Zdá sa, že všetko ide presne podľa Božieho plánu. Démon Crowley a anjel Azirafal už dlho žijú na zemi a celkom si tu zvykli. Ak si chcú zachovať svoj pohodlný životný štýl, neostáva im nič iné, len odvrátiť hroziaci armagedon. Najprv však budú musieť nájsť nezvestného Antikrista.
                </p>
              </article>
            </div>
            @foreach($topBooks as $book)
              <x-bookOverview :hover="TRUE" :book="$book"/>
            @endforeach
          </div>
      </section>
  </main>
@endsection

@section("scripts-content")
  <script src="./extern/owlcarousel/owl.carousel.min.js"></script>
@endsection