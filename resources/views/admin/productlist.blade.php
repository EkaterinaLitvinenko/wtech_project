@extends ("./layouts/adminLayout")

@section("head-content")
  <title>Admin panel</title>
  <link rel="stylesheet" href="{{ asset('styles/adm_productlist.css') }}">
@endsection

@section("content")
<main class="main-container">
    <header class="adm-prodlist-header">
        <h1>Zoznam produktov</h1>
        <a href="#" id="open-search-sm"><span class="fa-solid fa-magnifying-glass clickable" title="open search" ></span></a>
                <form  id="search-form"  method="GET" action="{{ url('/admin/list') }}">
                  <div class="input-group ">
                      <div class="input-group-prepend">
                          <a href="#" id="search-go-back" class="input-group-text"><span class="fa-solid fa-arrow-left" ></span></a>
                      </div>
                      <input class="form-control" type="search" placeholder="Zadajte titul alebo autora..." aria-label="Search" id="search-input" name="q">
                      <div class="input-group-append">
                          <button class="btn btn-outline-success" type="submit"><span class="fa-solid fa-magnifying-glass" title="search button"></span></button>
                      </div>
                  </div>
                </form>
        <a href="/admin/add" class="btn" id="add-btn"><span id = "add-text">Pridať</span></a>
    </header>

    <section>
        <form action="/admin/handle/" method="POST">
        @csrf
        @if(empty($books))
        <p id="no-result">Neboli nájdené žiadne výsledky.</p>
        @else
            @foreach($books as $book)
                <x-admin_product :book="$book"/>
            @endforeach
        @endif
        </form>
    </section>

    @if(!empty($books))
    <nav class="d-flex justify-content-center">
        {!! $booksQ->appends(['q' => $q])->links() !!}
    </nav>
    @endif
@endsection

@section("scripts-content")
    <!--<script src="../js/product_detail.js"></script>
    <script src="../js/delete_item.js"></script>
    <script src="../js/checkbox.js"></script>-->
@endsection
