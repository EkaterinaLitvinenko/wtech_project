@extends ("layouts.layout")

@section("head-content")
    <link rel="stylesheet" href="{{ asset('styles/register.css')}}">
    <title>Prihlásenie</title>       
    <script src="{{ asset('js/password_input.js')}}" defer></script>  
@endsection

@section("content")
<main class="container">
    <section class="row justify-content-center">
      <div class="col-lg-6 col-md-9 col-sm-12 col-12">
      <nav class="row links-register-login">
          <p>Prihlásenie</p>
          <a href="{{ asset('register')}}">Registrácia</a>
      </nav>
      <div class="register-container">
            <h1>Prihlásenie</h1>
            <form>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input class="form-control" type="email" name="email" placeholder="Zadajte e-mail..." required>
                </div>
                <div class="form-group password-container">
                    <label for="heslo">Heslo</label>
                    <input class="form-control" type="password" id="passwordInput" placeholder="Zadajte heslo..." required>
                    <span class="far fa-eye-slash" id="show-password" onclick="showPassword(passwordInput)"></span>
                </div>
                <div class="btn-center">
                    <input class="form-submit btn" type="submit" value="Prihlásiť sa">
                    {{-- <button class="btn" form="register-form">Prihlásiť sa</button> --}}
                </div>
            </form>
      </div>
    </div>
    </section>
</main>
@endsection
