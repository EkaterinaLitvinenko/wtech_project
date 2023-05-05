@extends ("layouts.baseLayout")

@section('body-content')
<header>
    <nav class="navbar navbar-expand-lg navbar-light justify-content-between">
            <a class="navbar-brand" href="/admin/list"><img src="{{ asset('res/logo.png') }}" alt="Read me" title="logo of read me"></a>
            <div class="profile-group">
             @auth
                <a href="#" id="profile" title="profile button"><span class="fa-sharp fa-solid fa-circle-user clickable" ></span></a>
                <form class="hideable" action="{{ route('logout') }}" method="POST">
                  @csrf
                    <button class="btn" id="logout">Odhlásiť sa</button>
                </form>
             @endauth
            </div>

    </nav>
</header>

@yield("content")

@endsection
