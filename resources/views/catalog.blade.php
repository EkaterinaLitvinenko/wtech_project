@extends ("layouts.layout")

@section("head-content")
    <link rel="stylesheet" href="{{ asset('styles/sidebar.css')}}">
    <link rel="stylesheet" href="{{ asset('styles/katalog.css')}}">
    <title>Katalóg produktov</title>
@endsection

@section("content")
    <main>
        <!--filter-->
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
        <section id="main-catalog">
            <h1>Všetky knihy</h1>
            <!--zoradovacie filtre-->
            <nav id="order-by">
                    <ul>
                      <li class="nav-item active">
                        <a class="nav-link" href="{{ route('catalog') }}">Novinky</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('catalog', ['genre' => $genre, 'sort' => 'bestsellers']) }}">Bestsellery</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('catalog', ['genre' => $genre, 'sort' => 'low-to-high']) }}">Najlacnejšie</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('catalog', ['genre' => $genre, 'sort' => 'high-to-low']) }}">Najdrahšie</a>
                      </li>
                    </ul>
            </nav>
            <!--knihy-->
            <div class="row">
                @foreach($books as $book)
                    <x-bookCatalog :book="$book"/>
                @endforeach
            </div>
            <!--paging-->
            
        </section>
    </main>
@endsection

@section("scripts-content")
    <script src="{{ asset('js/sidebar.js') }}"></script>
@endsection