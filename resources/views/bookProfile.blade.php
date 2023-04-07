@extends ("layouts.layout")

@section("head-content")
  <x-bookTitle :book="$book"/>
  <link rel="stylesheet" href="{{ asset('extern/owlcarousel/assets/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{ asset('extern/owlcarousel/assets/owl.theme.default.min.css') }}">

  <link rel="stylesheet" href="{{ asset('styles/book_profile.css') }}">
@endsection

@section("content")
  <main>
    <x-profile :book="$book"/>
  </main>
@endsection

@section("scripts-content")    
  <script src="{{ asset('js/book_profile.js')}}"></script>
  <script src="{{ asset('extern/owlcarousel/owl.carousel.min.js')}}"></script>
@endsection