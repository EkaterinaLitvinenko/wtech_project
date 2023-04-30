@extends('layouts.adminLayout')

@section('head-content')
<title>Upraviť produkt</title>
<link rel="stylesheet" href="{{asset('./styles/adm_product.css')}}">
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
        <div class="col-sm-12 col-lg-6">
            <a href="#" class="btn"><i class="fa-solid fa-chevron-left"></i> Späť do zoznamu</a>

            <h3 class="mb-3">Upraviť produkt</h3>
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
                        <input type="text" class="form-control" id="adm-product-name" name="title" placeholder="Názov knihy" value="{{ $book->title }}" required>
                    </div>
                    <div class="form-group col-12">
                        <label for="adm-product-author" re>Autor:</label>
                        <input type="text" class="form-control" id="adm-product-author" name="authors" placeholder="J.R.R. Tolkien; Ján Smrek;... " value="{{ $authors }}" required>
                    </div>
                    <div class="form-group col-12">
                    <label for="adm-product-author" re>ISBN:</label>
                    <input type="text" class="form-control" id="adm-product-isbn" name="isbn" placeholder="9788082071552" value="{{ $book->isbn }}" required>
                    </div>
                    <div class="form-group col-12">
                        <label for="adm-product-description">Popis*:</label>
                        <textarea class="form-control" id="adm-product-description" name="description" placeholder="Text" required>{{ $book->description }}</textarea>
                    </div>
                    <div class="form-group col-12">
                        <label for="adm-product-price" >Cena:</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="adm-product-price" name="price" placeholder="19.99" min="0.1" step="0.01" value="{{ $book->price }}" required>
                            <div class="input-group-append">
                                <span class="input-group-text">&euro;</span>
                            </div>
                        </div>
                    </div>
                    <fieldset class="form-group col-xl-6 col-sm-12">
                        <legend for="type">Typ:</legend>
                        <div class="form-check">
                            @if($book->type == 'brozovana')
                                <input class="form-check-input" type="radio" name="type" value="brozovana" id="brozovana" checked required>
                            @else
                                <input class="form-check-input" type="radio" name="type" value="brozovana" id="brozovana" required>
                            @endif
                            <label class="form-check-label" for="brozovana">Brožovaná väzba</label>
                        </div>
                        <div class="form-check">
                            @if($book->type == 'pevna')
                                <input class="form-check-input" type="radio" name="type" value="pevna" id="pevna" checked>
                            @else
                                <input class="form-check-input" type="radio" name="type" value="pevna" id="pevna">
                            @endif
                            <label class="form-check-label" for="pevna">Pevná väzba</label>
                        </div>
                        <div class="form-check">
                            @if($book->type == 'ekniha')
                                <input class="form-check-input" type="radio" name="type" value="ekniha" id="ekniha" checked>
                            @else
                                <input class="form-check-input" type="radio" name="type" value="ekniha" id="ekniha">
                            @endif
                            <label class="form-check-label" for="ekniha">eKniha</label>
                        </div>
                        <div class="form-check">
                            @if($book->type == 'audiokniha')
                                <input class="form-check-input" type="radio" name="type" value="audiokniha" id="audiokniha" checked>
                            @else
                                <input class="form-check-input" type="radio" name="type" value="audiokniha" id="audiokniha">
                            @endif
                            <label class="form-check-label" for="audiokniha">Audiokniha</label>
                        </div>
                    </fieldset>
                    <fieldset class="col-xl-6 col-sm-12">
                        <legend for="languages">Jazyky:</legend>
                        <div class="form-check">
                            @if($book->language == 'slovensky')
                                <input class="form-check-input" type="radio" name="language" value="slovensky" id="slovensky" checked required>
                            @else
                                <input class="form-check-input" type="radio" name="language" value="slovensky" id="slovensky" required>
                            @endif
                            <label class="form-check-label" for="slovensky">Slovenský</label>
                        </div>
                        <div class="form-check">
                            @if($book->language == 'anglicky')
                            <input class="form-check-input" type="radio" name="language" value="anglicky" id="anglicky" checked>
                            @else
                                <input class="form-check-input" type="radio" name="language" value="anglicky" id="anglicky">
                            @endif
                            <label class="form-check-label" for="anglicky">Anglický</label>
                        </div>
                    </fieldset>
                    <div class="form-group col-xl-6 col-sm-12">
                        <label for="adm-product-genre">Žáner:</label>
                        <select class="form-control" id="adm-product-genre" name="genre" required>
                            <option selected disabled value="">---</option>
                            @foreach($genres as $genre)
                                @if($book->genre == $genre)
                                <option value="{{$genre->id}}" selected>{{$genre->name}}</option>
                                @else
                                    <option value="{{$genre->id}}">{{$genre->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-xl-6 col-sm-12">
                        <label for="productPages">Počet strán:</label>
                        <input type="number" class="form-control" id="productPages" name="pages" placeholder="199" min="0" value="{{ $book->page_count }}" required>
                    </div>

                    <label for="productCover" class="col-sm-4 col-form-label">Pridať obálku*:</label>
                    <input id="productCover" class="form-control" type="file" name='cover' accept="image/png, image/jpeg">
                    <div class="col-12 text-center">
                        <img src="{{ asset('res/knihy/' . $cover) }}" class="edit-cover" alt="Obálka knihy: {{$book->title}}">
                    </div>

                    <label for="productImage" class="col-sm-4 col-form-label">Pridať obrázky*:</label>
                    <input id="productImage" class="form-control" type="file" name='images[]' accept="image/png, image/jpeg" multiple>
                    <div class="col-12 text-center">
                        @foreach($filenames as $photo)
                            <label for='{{$photo}}'> <img src="{{ asset('res/knihy/' . $photo) }}" class="edit-cover" alt="Obrázok knihy: {{$book->title}}">
                            <input type="checkbox" name = "deleteImgs[]" class="delete-img" id="{{$photo}}" value={{$photo}}>
                        @endforeach
                    </div>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit"
                            class="btn btn-secondary"
                            name='action'
                            title="odstranit z košika"
                            value="update,{{$book->id}}"
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
