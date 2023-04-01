<!DOCTYPE html>
<html>
    <head>
        <!--Bootstrap 4 docs: https://getbootstrap.com/docs/4.0/getting-started/introduction/-->
        <meta charset="utf-8">
        <title>Katalóg produktov</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    
        <link rel="stylesheet" href="./styles/global.css">
        <link rel="stylesheet" href="./styles/sidebar.css">
        <link rel="stylesheet" href="./styles/katalog.css">

        <link rel="icon" href="./res/book_icon/favicon.ico">
    </head>
    <body>
        <x-navigation :loggedin="false"/>

        <main>
          <!----------filter ---------------------------------------------------------------->
            <aside id="sidebar-filter">
            <span id="sidebar-open" class="fa-solid fa-chevron-right"></span>
            <form id="filter-form">
            <fieldset class="side-menu">
                <legend class="nav-item-title">Typ</legend>
                <ul class="sub-menu">
                    <li class="sub-item">
                        <label for="type-kniha"><input type="checkbox" id="type-kniha">Kniha</label>
                    </li>
                    <li class="sub-item">
                        <label for="type-ekniha"><input type="checkbox" id="type-ekniha">eKniha</label>
                    </li>
                    <li class="sub-item">
                        <label for="type-audiokniha"><input type="checkbox" id="type-audiokniha">Audiokniha</label>
                    </li>
                </ul>
            </fieldset>
                     
            <fieldset class="side-menu">
                <legend class="nav-item-title">Žáner</legend>
                <ul class="sub-menu">
                    <li class="sub-item">
                        <label for="genre-his"><input type="checkbox" id="genre-his">Historický</label>
                    </li>
                    <li class="sub-item">
                        <label for="genre-bel"><input type="checkbox" id="genre-bel">Beletria</label>
                    </li>
                    <li class="sub-item">
                        <label for="genre-hum"><input type="checkbox" id="genre-hum">Humorný</label>
                    </li>
                    <li class="sub-item">
                        <label for="genre-ro"><input type="checkbox" id="genre-rom">Romantický</label>
                    </li>
                    <li class="sub-item">
                        <label for="genre-fan"><input type="checkbox" id="genre-fan">Fantasy</label>
                    </li>
                    <li class="sub-item">
                        <label for="genre-sci"><input type="checkbox" id="genre-sci">Sci-fi</label>
                    </li>
                    <li class="sub-item">
                        <label for="genre-det"><input type="checkbox" id="genre-det">Detektívy</label>
                    </li>
                    <li class="sub-item">
                        <label for="genre-tri"><input type="checkbox" id="genre-tri">Triler a horor</label>
                    </li>
                    <li class="sub-item">
                        <label for="genre-you"><input type="checkbox" id="genre-you">Young Adult</label>
                    </li>
                    <li class="sub-item">
                        <label for="genre-pdet"><input type="checkbox" id="genre-pdet">Pre deti</label>
                    </li>
                </ul>           
            </fieldset>             
          
            <fieldset class="side-menu">
                    <legend class="nav-item-title">Jazyk</legend>
                    <ul class="sub-menu">        
                        <li class="sub-item">
                            <label for="lang-sk"><input type="checkbox" id="lang-sk">slovenský</label>
                        </li>
                        <li class="sub-item">
                            <label for="lang-en"><input type="checkbox" id="lang-en">anglický</label>
                        </li>
                    </ul>
            </fieldset>
          
            <fieldset class="side-menu">
                <legend class="nav-item-title">Počet strán</legend>
                <ul class="sub-menu">  
                    <li class="sub-item">
                        <label for="pocet-stran-1"><input type="checkbox" id="pocet-stran-1">do 100</label>
                    </li>
                    <li class="sub-item">
                        <label for="pocet-stran-2"><input type="checkbox" id="pocet-stran-2">100-200</label>
                    </li>
                    <li class="sub-item">
                        <label for="pocet-stran-3"><input type="checkbox" id="pocet-stran-3">200-300</label>
                    </li>  
                    <li class="sub-item">
                        <label for="pocet-stran-3"><input type="checkbox" id="pocet-stran-3">300-400</label>
                    </li>
                    <li class="sub-item">
                        <label for="pocet-stran-3"><input type="checkbox" id="pocet-stran-3">400-500</label>
                    </li>  
                    <li class="sub-item">
                        <label for="pocet-stran-3"><input type="checkbox" id="pocet-stran-3">od 500</label>
                    </li>    
                </ul>   
            </fieldset>
            <button type="button" class="btn btn-dark" id="apply-btn">Aplikovať parametre</button>
            <button type="button" class="btn btn-dark" id="cancel-btn">Zrušiť parametre</button>     
            </form>
                              
            </aside>
            <!--top filtre-->
            <section id="main-catalog">
                <h1>Všetky knihy</h1>
                <nav id="order-by">
                    <ul>
                      <li class="nav-item active">
                        <a class="nav-link" href="#">Novinky</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Bestsellery</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Najdrahšie</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Najlacnejšie</a>
                      </li>
                    </ul>
                </nav>

                <!--Knihy-->
                <div class="row">
                    @foreach($books as $book)
                        <x-bookCatalog :book="$book"/>
                    @endforeach
                </div>

                <!--paging-->
           
            <div class="d-flex justify-content-center">
                {!! $books->links() !!}
            </div>
        </section>
    </main>
    
    <x-footer />

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
        <script src="./js/navigation.js"></script>
        <script src="./js/sidebar.js"></script>
        <script src="./js/main.js"></script>
    </body>
</html>