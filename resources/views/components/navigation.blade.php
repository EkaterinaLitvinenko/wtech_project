@props(['loggedin'])
<header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="/"><img src="{{ asset('res/logo.png') }}" alt="Read me" title="logo of read me"></a>
          
            <nav class="collapse navbar-collapse" id="navbar-collapsible">
              <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                  <a class="nav-link" href="/katalog">Knihy</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('catalog', ['sort' => 'bestsellers']) }}">Bestsellery</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="./katalog.html">eKnihy</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./katalog.html">Audioknihy</a>
                  </li>
              </ul>
            </nav>
            <nav class="navigation-actions">
              <a href="#" id="open-search-sm"><span class="fa-solid fa-magnifying-glass clickable" title="open search" ></span></a>
              <form  id="search-form">
                  <div class="input-group ">
                      <div class="input-group-prepend">
                          <a href="#" id="search-go-back" class="input-group-text"><span class="fa-solid fa-arrow-left" ></span></a>
                      </div>
                      <input class="form-control" type="search" placeholder="Zadajte titul, autora, ISBN..." aria-label="Search" id="search-input">
                      <div class="input-group-append">
                          <button class="btn btn-outline-success" type="submit"><span class="fa-solid fa-magnifying-glass" title="search button"></span></button>
                      </div>
                  </div>
                </form>
                <div class="profile-group">
                @auth
                  <a href="#" id="profile" title="profile button"><span class="fa-sharp fa-solid fa-circle-user clickable" ></span></a>
                  <form class="hideable">
                      <p><strong>Vitajte, {{auth()->user()->first_name}}!</strong></p>
                      <p>Moje objednávky</p>
                      <p>Moje reklamácie</p>
                      <p>Moje osobné údaje</p>
                      <button class="btn" id="logout">  Odhlásiť sa </button>
                  </form>
                @endauth
                @guest
                  <a href="./login.html" id="" title="profile button"><span class="fa-sharp fa-solid fa-circle-user clickable" ></span></a>
                @endguest
                </div>
                <a href="/cart" class="clickable"><span class="fa-solid fa-basket-shopping" title="shopping cart"></span></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapsible" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
              </nav>
        </nav>
</header>