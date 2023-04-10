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
            <form id="filter-form" method="GET" action="/katalog">
                <fieldset class="side-menu">
                    <legend class="nav-item-title">Typ</legend>
                    <ul class="sub-menu">
                        <li class="sub-item">
                            <input type="checkbox" id="type-kniha" name="type[]" value="kniha">
                            <label for="type-kniha">Kniha</label>
                        </li>
                        <li class="sub-item">
                            <input type="checkbox" id="type-ekniha" name="type[]" value="ekniha">
                            <label for="type-ekniha" >eKniha</label>
                        </li>
                        <li class="sub-item">
                            <input type="checkbox" id="type-audiokniha" name="type[]" value="audiokniha">
                            <label for="type-audiokniha">Audiokniha</label>
                        </li>
                    </ul>
                </fieldset>
                <fieldset class="side-menu">
                    <legend class="nav-item-title">Žáner</legend>
                    <ul class="sub-menu">
                        <li class="sub-item">
                            <input type="checkbox" id="genre-his" name="genre[]" value="Historický">
                            <label for="genre-his">Historický</label>
                        </li>
                        <li class="sub-item">
                            <input type="checkbox" id="genre-bel" name="genre[]" value="Beletria">
                            <label for="genre-bel">Beletria</label>
                        </li>
                        <li class="sub-item">
                            <input type="checkbox" id="genre-hum" name="genre[]" value="Humorný">
                            <label for="genre-hum">Humorný</label>
                        </li>
                        <li class="sub-item">
                            <input type="checkbox" id="genre-ro" name="genre[]" value="Romantický">
                            <label for="genre-ro">Romantický</label>
                        </li>
                        <li class="sub-item">
                            <input type="checkbox" id="genre-fan" name="genre[]" value="Fantasy">
                            <label for="genre-fan">Fantasy</label>
                        </li>
                        <li class="sub-item">
                            <input type="checkbox" id="genre-sci" name="genre[]" value="Sci-fi">
                            <label for="genre-sci">Sci-fi</label>
                        <li class="sub-item">
                            <input type="checkbox" id="genre-det" name="genre[]" value="Detektívky">
                            <label for="genre-det">Detektívky</label>
                        </li>
                        <li class="sub-item">
                            <input type="checkbox" id="genre-th" name="genre[]" value="TrilerAHoror">
                            <label for="genre-th">Triler a horor</label>
                        </li>
                        <li class="sub-item">
                            <input type="checkbox" id="genre-ya" name="genre[]" value="YoungAdult">
                            <label for="genre-ya">Young Adult</label>
                        </li>
                        <li class="sub-item">
                            <input type="checkbox" id="genre-pdet" name="genre[]" value="PreDeti">
                            <label for="genre-pdet">Pre deti</label>
                        </li>
                    </ul>           
                </fieldset>             
                <fieldset class="side-menu">
                        <legend class="nav-item-title">Jazyk</legend>
                        <ul class="sub-menu">        
                            <li class="sub-item">
                                <input type="checkbox" id="lang-sk" name="lang[]" value="slovensky">
                                <label for="lang-sk">slovenský</label>
                            </li>
                            <li class="sub-item">
                                <input type="checkbox" id="lang-en" name="lang[]" value="anglicky">
                                <label for="lang-en">anglický</label>
                            </li>
                        </ul>
                </fieldset>
                <fieldset class="side-menu">
                    <legend class="nav-item-title">Počet strán</legend>
                    <ul class="sub-menu">  
                        <li class="sub-item">
                            <input type="checkbox" id="pocet-stran-1" name="pages[]" value="0-100">
                            <label for="pocet-stran-1">do 100</label>
                        </li>
                        <li class="sub-item">
                            <input type="checkbox" id="pocet-stran-2" name="pages[]" value="100-200">
                            <label for="pocet-stran-2">100-200</label>
                        </li>
                        <li class="sub-item">
                            <input type="checkbox" id="pocet-stran-3" name="pages[]" value="200-300">
                            <label for="pocet-stran-3">200-300</label>
                        </li>  
                        <li class="sub-item">
                            <input type="checkbox" id="pocet-stran-4" name="pages[]" value="300-400">
                            <label for="pocet-stran-4">300-400</label>
                        </li>
                        <li class="sub-item">
                            <input type="checkbox" id="pocet-stran-5" name="pages[]" value="400-500">
                            <label for="pocet-stran-5">400-500</label>
                        </li>  
                        <li class="sub-item">
                            <input type="checkbox" id="pocet-stran-6" name="pages[]" value="500-1000">
                            <label for="pocet-stran-6">od 500</label>
                        </li>    
                    </ul>   
                </fieldset>
                <button type="button" class="btn btn-dark" id="apply-btn">Aplikovať parametre</button>
                <button type="button" class="btn btn-dark" id="cancel-btn">Zrušiť parametre</button>     
            </form>
        </aside>
        
        <section id="main-catalog">
            <!--zoradovacie filtre-->
            <nav id="order-by">
                    <ul>
                      <li class="nav-item active">
                        <a class="nav-link" href="{{ route('catalog', ['type' => $type, 'q' => $q, 'genre' => $genre, 'lang' => $lang, 'pages' => $pages, 'sort' => 'novinky']) }}">Novinky</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('catalog', ['type' => $type, 'q' => $q, 'genre' => $genre, 'lang' => $lang, 'pages' => $pages, 'sort' => 'bestsellers']) }}">Bestsellery</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('catalog', ['type' => $type, 'q' => $q, 'genre' => $genre, 'lang' => $lang, 'pages' => $pages, 'sort' => 'low-to-high']) }}">Najlacnejšie</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('catalog', ['type' => $type, 'q' => $q, 'genre' => $genre, 'lang' => $lang, 'pages' => $pages, 'sort' => 'high-to-low']) }}">Najdrahšie</a>
                      </li>
                    </ul>
            </nav>

            <!--knihy-->
            <div class="row">
            @if($books->isEmpty())
                <p id="no-result">Neboli nájdené žiadne výsledky.</p>
            @else
            @foreach($books as $book)
                    dd($book);
                    <x-bookCatalog :book="$book"/>
                @endforeach
            @endif
            </div>

            <!--paging-->
            @if(!$books->isEmpty())
            <nav class="d-flex justify-content-center">
            
                {!! $books->appends(['type' => $type, 'q' => $q, 'genre' => $genre, 'lang' => $lang, 'pages' => $pages, 'sort' => $sort])->links() !!}
            </nav>
            @endif
            
        </section>
    </main>
@endsection

@section("scripts-content")
    <script src="{{ asset('js/sidebar.js') }}"></script>
@endsection