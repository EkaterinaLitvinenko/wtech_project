@extends('layouts.adminLayout')

@section('head-content')
@isset($book)
<title>Upraviť produkt</title>
@endisset
@empty($book)
<title>Pridať produkt</title>
@endempty
<link rel="stylesheet" href="{{asset('./styles/adm_product.css')}}">
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
        <div class="col-sm-12 col-lg-6">
            <a href="/admin/list" class="btn" id="back-btn">Späť do zoznamu</a>

            @isset($book)
            <h3 class="mb-3">Upraviť produkt</h3>
            @endisset
            @empty($book)
            <h3 class="mb-3">Pridať produkt</h3>
            @endempty

            <p class="text-right">* povinné polia</p>

            @if ($errors->any())
            <div class="alert alert-danger error-dialog" id="dialog">
                <span class="fa-solid fa-xmark" id="dialog-close"></span>
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
            @endif

            <form class="create-update" method="POST" action="handle" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-group col-12">
                        <label for="adm-product-name">Názov*:</label>
                        <input type="text" class="form-control" id="adm-product-name" name="title" placeholder="Názov knihy" value="{{ $book->title ?? '' }}" required>
                    </div>
                    <div class="form-group col-12">
                        <label for="adm-product-author" re>Autor:</label>
                        <input type="text" class="form-control" id="adm-product-author" name="authors" placeholder="J.R.R. Tolkien; Ján Smrek;... " value="{{ $authors ?? '' }}" required>
                    </div>
                    <div class="form-group col-12">
                    <label for="adm-product-author" re>ISBN:</label>
                    <input type="text" class="form-control" id="adm-product-isbn" name="isbn" placeholder="9788082071552" value="{{ $book->isbn ?? '' }}" required>
                    </div>
                    <div class="form-group col-12">
                        <label for="adm-product-description">Popis*:</label>
                        <textarea class="form-control" id="adm-product-description" name="description" placeholder="Text" required>{{ $book->description ?? '' }}</textarea>
                    </div>
                    <div class="form-group col-12">
                        <label for="adm-product-price" >Cena:</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="adm-product-price" name="price" placeholder="19.99" min="0.1" step="0.01" value="{{ $book->price ?? '' }}" required>
                            <div class="input-group-append">
                                <span class="input-group-text">&euro;</span>
                            </div>
                        </div>
                    </div>
                    <fieldset class="form-group col-xl-6 col-sm-12">
                        <legend for="type">Typ:</legend>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="type" value="brozovana" id="brozovana" required @checked($book->type ?? '' == 'brozovana')>
                            <label class="form-check-label" for="brozovana">Brožovaná väzba</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="type" value="pevna" id="pevna" @checked($book->type ?? '' == 'pevna')>
                            <label class="form-check-label" for="pevna">Pevná väzba</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="type" value="ekniha" id="ekniha" @checked($book->type ?? ''== 'ekniha')>
                            <label class="form-check-label" for="ekniha">eKniha</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="type" value="audiokniha" id="audiokniha" @checked($book->type ?? ''== 'audiokniha')>
                            <label class="form-check-label" for="audiokniha">Audiokniha</label>
                        </div>
                    </fieldset>
                    <fieldset class="col-xl-6 col-sm-12">
                        <legend for="languages">Jazyky:</legend>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="language" value="slovensky" id="slovensky" @checked($book->language ?? ''== 'slovensky') required>
                            <label class="form-check-label" for="slovensky">Slovenský</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="language" value="anglicky" id="anglicky" @checked($book->language ?? '' == 'anglicky')>
                            <label class="form-check-label" for="anglicky">Anglický</label>
                        </div>
                    </fieldset>
                    <div class="form-group col-xl-6 col-sm-12">
                        <label for="adm-product-genre">Žáner:</label>
                        <select class="form-control" id="adm-product-genre" name="genre" required>
                            <option selected disabled value="">---</option>
                            @foreach($genres as $genre)
                                <option value="{{$genre->id}}" @selected($book->genre ?? ''== $genre)>{{$genre->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-xl-6 col-sm-12">
                        <label for="productPages">Počet strán:</label>
                        <input type="number" class="form-control" id="productPages" name="pages" placeholder="199" min="0" value="{{ $book->page_count ?? ''}}" required>
                    </div>

                    <label for="productCover" class="col-sm-4 col-form-label">Pridať obálku*:</label>
                    <input id="productCover" class="form-control" type="file" name='cover' accept="image/png, image/jpeg">
                    @isset($book)
                    <div class="col-12 text-center">
                        <img src="{{ asset('res/knihy/' . $cover) }}" class="edit-cover" alt="Obálka knihy: {{$book->title}}">
                    </div>
                    @endisset
                    <label for="productImage" class="col-sm-4 col-form-label">Pridať obrázky*:</label>
                    <input id="productImage" class="form-control" type="file" name='images[]' accept="image/png, image/jpeg" multiple>
                    @isset($book)
                    <div class="col-12 text-center">
                        @foreach($filenames as $photo)
                            <label for='{{$photo}}'> <img src="{{ asset('res/knihy/' . $photo) }}" class="edit-cover" alt="Obrázok knihy: {{$book->title}}">
                            <input type="checkbox" name = "deleteImgs[]" class="delete-img" id="{{$photo}}" value={{$photo}}>
                        @endforeach
                    </div>
                    @endisset
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit"
                            id="btn-save"
                            class="btn"
                            name='action'
                            title="odstranit z košika"
                            @isset($book)
                            value="update,{{$book->id}}"
                            @endisset
                            @empty($book)
                            value="create"
                            @endempty
                    >
                    Uložiť
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts-content')
    <script src="{{asset('js//dragndrop.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
@endsection
