@extends ("./layouts/adminLayout")

@section("head-content")
    <link rel="stylesheet" href="{{ asset('styles/register.css')}}">
    <title>Prihlásenie</title>
    <script src="{{ asset('js/password_input.js')}}" defer></script>
@endsection

@section("content")
        <main class="container">
            <section class="row justify-content-center">
                <div class="register-container col-lg-6 col-md-9 col-sm-12 col-12">
                    <h1>Prihlásenie</h1>
                    <form action="{{ route('admin.login') }}" method="POST">
                        @csrf
                        <fieldset>
                              <div class="form-group">
                                <label for="email">E-mail</label>
                                <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" placeholder="Zadajte e-mail..." required>
                                @error('email')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                               </div>
                            <div class="form-group password-container">
                                <label for="heslo">Heslo</label>
                                <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" id="passwordInput" placeholder="Zadajte heslo..." required>
                                <span class="far fa-eye-slash" id="show-password" onclick="showPassword(passwordInput)"></span>
                                @error('password')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="btn-center">
                                <input class="form-submit btn" type="submit" value="Prihlásiť sa">
                            </div>
                        </fieldset>
                    </form>
                </div>

            </section>
        </main>

@endsection
