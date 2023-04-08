@extends ("layouts.layout")

@section("head-content")
    <link rel="stylesheet" href="{{ asset('./styles/cart.css')}}">
    <title>Váš košík</title>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        
    <script src="./js/cart.js"></script>
@endsection

@section('content')
        <main class="container-fluid">
            <!--Obsah-->
            <x-progressbar activated="1" />
            <section class="row justify-content-center">
                <div class="col-lg-8 col-md-10 col-sm-12" id="cart">
                    <header>
                        <h1>Váš košík</h1>
                    </header>
                    <form id="cart-form" action="/cart/handle" method="POST">
                        @csrf
                        @if(count($cart) != 0)
                        @foreach($cart as $book) 
                            <x-cartItem :book="$book"/>
                        @endforeach
                        @else
                            <p>Nemate v košíku žiadne knihy</p>
                        @endif
                        <footer>
                            <p>Spolu <strong><span id="sum">0</span> <abbr title="EUR">€</abbr></strong></p>
                            <a href="./index.html" class="btn cancel">Späť na knihy</a> 
                            <button 
                            class="btn continue"
                            name="action"
                            value="save"
                            @if(count($cart) == 0)
                            disabled
                            @endif
                            >Pokračovať</button>
                        </footer>
                    </form>
                </div>
            </section>
        </main>
@endsection