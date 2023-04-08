@extends ("layouts.layout")



@section("content")
<main class="container-fluid">
    @yield('progressbar')
    <div class="row justify-content-center">
        <section class="col-lg-5 col-md-7 col-sm-12 col-12 delivery">
            @yield('form-header')
            <div class="form-part">
                @yield('form-part-top')
            </div>
            <div class="form-part">
                @yield('form-part-bottom')
            </div>
            @csrf
            </form>
        </section>
        <x-orderReview :cart="$cart"/>
    </div>
    <footer class="row justify-content-center form-footer">
        <div class="col-md-8 col-12">
        @yield('form-footer')
        </div>
    </footer>
</main>
@endsection
