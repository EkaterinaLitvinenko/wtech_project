@extends ("layouts.baseLayout")

@section('body-content')
<x-navigation/>
@yield("content")
<x-footer />
@endsection
