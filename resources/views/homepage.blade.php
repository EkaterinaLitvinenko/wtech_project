<!DOCTYPE html>
<html>
    <head>
        <!--Bootstrap 4 docs: https://getbootstrap.com/docs/4.0/getting-started/introduction/-->
        <meta charset="utf-8">
        <title>ReadMe BookShop</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    
        <link rel="stylesheet" href="./extern/owlcarousel/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="./extern/owlcarousel/assets/owl.theme.default.min.css">

        <link rel="stylesheet" href="./styles/global.css">
        <link rel="stylesheet" href="./styles/homescreen.css">

        <link rel="icon" href="./res/book_icon/favicon.ico">
    </head>
    <body>
      <x-navigation :loggedin="false"/>

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
            </section>

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
            </section>

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

      <x-footer />

      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
      <script src="./js/main.js"></script>
      <script src="./extern/owlcarousel/owl.carousel.min.js"></script>


    </body>
</html>