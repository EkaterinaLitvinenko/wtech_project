@extends ("layouts.layout")

@section("head-content")
    <link rel="stylesheet" href="{{ asset('styles/register.css')}}">
    <title>Registrácia</title>
    <script src="{{ asset('js/password_input.js')}}" defer></script>
@endsection


@section("content")
<main class="container">
    <section class="row justify-content-center">
        <nav class="container row links-register-login">
          <a href="{{ asset('login')}}">Prihlásenie</a>
          <p>Registrácia</p>
        </nav>

        <div class="register-container">
            <h1>Registrácia</h1>
        <form action="{{ route('register')}}" method="POST" id="register-form container">
                    @csrf
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input class="form-control" type="text" name="email" placeholder="Zadajte e-mail..." required>
                    </div>
                    <div class="form-row">
                      <div class="form-group col">
                          <label for="first-name">Meno</label>
                          <input class="form-control" type="text" name="first_name" placeholder="Zadajte meno..." required>
                      </div>
                      <div class="form-group col">
                          <label for="last-name">Priezvisko</label>
                          <input class="form-control" type="text" name="last_name" placeholder="Zadajte priezvisko..." required>
                      </div>
                    </div>
                   <div class="form-group password-container">
                        <label for="heslo">Heslo</label>
                        <input class="form-control" type="password" name="password" for="password" id="passwordInput" placeholder="Zadajte heslo..." required>
                        <span class="far fa-eye-slash" id="show-password" onclick="showPassword(passwordInput)"></span>
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group agreement-row">
                      <div>
                          <input type="checkbox" id="terms" name="terms" required>
                          <label for="terms">Súhlasím s obchodnými podmienkami</label>
                      </div>
                      <div class>
                          <input type="checkbox" id="consent" name="consent" required>
                          <label for="consent">Súhlasím so spracovaním osobných údajov</label>
                      </div>
                    </div>
                    <div class="btn-center">
                      <input class="form-submit btn" type="submit" value="Zaregistrovať sa">
                    </div>
            </form>
          </div>
    </section>
</main>
@endsection
