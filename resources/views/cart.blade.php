
<!DOCTYPE html>
<html lang="SK">
    <head>
        <!--Bootstrap 4 docs: https://getbootstrap.com/docs/4.0/getting-started/introduction/-->
        <meta charset="utf-8">
        <title>Váš košík</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    
        <link rel="stylesheet" href="./styles/global.css">
        <link rel="stylesheet" href="./styles/cart.css">

        <link rel="icon" href="./res/book_icon/favicon.ico">

        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        
        <script src="./js/cart.js"></script>
    </head>
    <body>
        <x-navigation :loggedin="false" />
        <main class="container-fluid">
            <!--Obsah-->
            <nav class="row">
                <ul id="progressbar">
                    <li class="active">Košík</li>
                    <li>Doprava</li>
                    <li>Platba</li>
                </ul>
            </nav>
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
        <x-footer />
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        
        <script src="./js/main.js"></script>
    </body>
</html>