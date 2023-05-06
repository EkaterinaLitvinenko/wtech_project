@extends ("./layouts/adminLayout")

@section("head-content")
  <title>Admin panel</title>
  <link rel="stylesheet" href="{{ asset('styles/adm_productlist.css') }}">
@endsection

@section("content")
<main class="main-container">

    <div id="myModal" class="modal">
        <div class="modal-content">
          <p>Naozaj chcete knihu vymazať?</p>
          <div class="flex">
              <button class="btn" type="button">Zrušiť</button>
              <button
                form="list-form"
                type="submit"
                id="delete-btn"
                class="btn btn-save"
                name="action"
                value=""
              >Potvrdiť</button>
          </div>
        </div>
    </div>

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
        <form id="list-form" action="/admin/handle/" method="POST">
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

@section('scripts-content')
<script>
    function openModal(button) {
        console.log("aa");
        var bookId = button.value;

        var modal = document.getElementById("myModal");
        var cancelBtn = modal.querySelector(".btn");
        var confirmBtn = document.getElementById("delete-btn");
        confirmBtn.value="delete,"+bookId;
        cancelBtn.addEventListener("click", closeModal);

        modal.style.display = "block";

        function closeModal() {
            cancelBtn.removeEventListener("click", closeModal);
            modal.style.display = "none";
        }
    }
</script>
@endsection
