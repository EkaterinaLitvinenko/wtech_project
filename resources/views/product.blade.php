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
        <form>
            <div class="row">
                <div class="form-group col-12">
                    <label for="adm-product-name">Názov:</label>
                    <input type="text" class="form-control" id="adm-product-name" placeholder="">
                </div>
                <div class="form-group col-12">
                    <label for="adm-product-author">Autor:</label>
                    <input type="text" class="form-control" id="adm-product-author" placeholder="">
                </div>
                    <div class="form-group col-12">
                    <label for="adm-product-description">Popis:</label>
                    <textarea class="form-control" id="adm-product-description" placeholder=""></textarea>
                </div>
                <div class="form-group col-12">
                    <label for="adm-product-price">Cena:</label>
                    <div class="input-group">
                        <input type="number" class="form-control" id="adm-product-price" placeholder="">
                        <div class="input-group-append">
                            <span class="input-group-text">&euro;</span>
                        </div>
                    </div>
                 </div>
                 <div class="form-group col-xl-6 col-sm-12">
                    <label for="type">Typ:</label>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="type[]" value="Kniha" id="kniha">
                      <label class="form-check-label" for="kniha">Kniha</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="type[]" value="eKniha" id="ekniha">
                      <label class="form-check-label" for="ekniha">eKniha</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="type[]" value="Audiokniha" id="audiokniha">
                      <label class="form-check-label" for="audiokniha">Audiokniha</label>
                    </div>
                  </div>
                  <div class="col-xl-6 col-sm-12">
                    <label for="languages">Jazyky:</label>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="languages[]" value="slovensky" id="slovensky">
                      <label class="form-check-label" for="slovensky">Slovenský</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="languages[]" value="anglicky" id="anglicky">
                      <label class="form-check-label" for="anglicky">Anglický</label>
                    </div>
                  </div>
                <div class="form-group col-xl-6 col-sm-12">
                    <label for="adm-product-genre">Žáner:</label>
                    <select class="form-control" id="adm-product-genre">
                        <option>---</option>
                        <option>Historický</option>
                        <option>Beletria</option>
                        <option>Humorný</option>
                        <option>Romantický</option>
                        <option>Fantasy</option>
                        <option>Sci-fi</option>  
                        <option>Detektívy</option>
                        <option>Triler a horor</option>
                        <option>Young Adult</option>
                        <option>Pre deti</option>
                    </select>
                </div>
                <div class="form-group col-xl-6 col-sm-12">
                    <label for="productPages">Počet strán:</label>
                    <input type="number" class="form-control" id="productPages" value="">
                </div>
                <label for="productImage" class="col-sm-4 col-form-label">Pridať obrázky:</label>
                <div class="col-sm-12">
                    <div class="col-xl-3" id="dropzone">
                        <label for="file-input">
                          <i class="fa-solid fa-arrow-up-from-bracket"></i>
                          <p>Choose a file or drag it here</p>
                        </label>
                        <input id="file-input" type="file">
                      </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                      <div id="preview-container"></div>
                    </div>
                </div>
                
            </div>
            <button type="button" class="btn btn-secondary">
               Uložiť
            </button>
        </form>
    </div>
</div>

@endsection


@section('scripts-content')
<script src="{{asset('js//dragndrop.js')}}"></script>    

@endsection