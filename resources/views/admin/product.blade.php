@extends('layouts.adminLayout')

@section('head-content')
<title>Pridať produkt</title>
<link rel="stylesheet" href="{{asset('./styles/adm_addproduct.css')}}">
@endsection

@section('content')

<div class="container">
    <div class="row justify-content-center">
      <div class="col-sm-12 col-lg-6">
        <a href="#" class="btn"><i class="fa-solid fa-chevron-left"></i> Späť do zoznamu</a>

        <h3 class="mb-3">Pridať produkt</h3>
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
        <form method="POST" action="handle" enctype="multipart/form-data">
            <div class="row">
                <div class="form-group col-12">
                    <label for="adm-product-name">Názov:</label>
                    <input type="text" class="form-control" id="adm-product-name" name="title" placeholder="Názov knihy" required>
                </div>
                <div class="form-group col-12">
                    <label for="adm-product-author" re>Autory:</label>
                    <input type="text" class="form-control" id="adm-product-author" name="authors" placeholder="J.R.R. Tolkien;Ján Smrek;... " required>
                </div>
                <div class="form-group col-12">
                  <label for="adm-product-author" re>ISBN:</label>
                  <input type="text" class="form-control" id="adm-product-isbn" name="isbn" placeholder="9788082071552" required>
                </div>
                <div class="form-group col-12">
                    <label for="adm-product-description">Popis:</label>
                    <textarea class="form-control" id="adm-product-description" name="description" placeholder="Text" required></textarea>
                </div>
                <div class="form-group col-12">
                    <label for="adm-product-price" >Cena:</label>
                    <div class="input-group">
                        <input type="number" class="form-control" id="adm-product-price" name="price" placeholder="19.99" min="0.1" step="0.01" required>
                        <div class="input-group-append">
                            <span class="input-group-text">&euro;</span>
                        </div>
                    </div>
                 </div>
                 <fieldset class="form-group col-xl-6 col-sm-12">
                    <legend for="type">Typ:</legend>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="type" value="brozovana" id="brozovana" required>
                      <label class="form-check-label" for="brozovana">Brožovaná väzba</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="type" value="pevna" id="pevna" >
                      <label class="form-check-label" for="pevna">Pevná väzba</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="type" value="ekniha" id="ekniha">
                      <label class="form-check-label" for="ekniha">eKniha</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="type" value="audiokniha" id="audiokniha">
                      <label class="form-check-label" for="audiokniha">Audiokniha</label>
                    </div>
                 </fieldset>
                  <fieldset class="col-xl-6 col-sm-12">
                    <legend for="languages">Jazyky:</legend>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="language" value="slovensky" id="slovensky" required>
                      <label class="form-check-label" for="slovensky">Slovenský</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="language" value="anglicky" id="anglicky">
                      <label class="form-check-label" for="anglicky">Anglický</label>
                    </div>
                  </fieldset>
                <div class="form-group col-xl-6 col-sm-12">
                    <label for="adm-product-genre">Žáner:</label>
                    <select class="form-control" id="adm-product-genre" name="genre" required>
                        <option selected disabled value="">---</option>
                        @foreach($genres as $genre)
                          <option value="{{$genre->id}}">{{$genre->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-xl-6 col-sm-12">
                    <label for="productPages">Počet strán:</label>
                    <input type="number" class="form-control" id="productPages" name="pages" placeholder="199" min="0" required>
                </div>
                
                <label for="productCover" class="col-sm-4 col-form-label">Pridať Obálku:</label>
                <input id="productCover" class="form-control" type="file" name='cover' accept="image/png, image/jpeg" required>
                <label for="productImage" class="col-sm-4 col-form-label">Pridať obrázky:</label>
                <input id="productImage" class="form-control" type="file" name='images[]' accept="image/png, image/jpeg" multiple required>
                <!--<div class="col-sm-12">
                    <div class="col-xl-3" id="dropzone">
                        <label for="file-input">
                          <i class="fa-solid fa-arrow-up-from-bracket"></i>
                          <p>Choose a file or drag it here</p>
                        </label>
                        <input id="file-input" type="file" name='images[]'  multiple>
                      </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                      <div id="preview-container"></div>
                    </div>
                </div>-->
                
            </div>
            @csrf
            <button type="submit" class="btn btn-secondary" name='action' value="create">
               Uložiť
            </button>
        </form>
    </div>
</div>

@endsection


@section('scripts-content')
<script src="{{asset('js//dragndrop.js')}}"></script>    
@endsection