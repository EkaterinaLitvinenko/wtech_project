<!DOCTYPE html>
<html lang="en">
    <head>
        <!--Bootstrap 4 docs: https://getbootstrap.com/docs/4.0/getting-started/introduction/-->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    
        <link rel="stylesheet" href="../styles/global.css">
        <link rel="stylesheet" href="../styles/adm_editproduct.css">
        <link rel="icon" href="../res/book_icon/favicon.ico">
        <title>Upraviť produkt</title>
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="#"><img src="../res/logo.png"alt="Read me" title="logo of read me"></a>
                    <div class="adm-navigation-actions">
                        <div class="profile-group">
                            <a href="#" id="profile" title="profile button"><span class="fa-sharp fa-solid fa-circle-user clickable" ></span></a>
                            <form class="hideable">
                                <button class="btn" id="logout">odhlasiť sa </button>
                            </form>
                        </div>  
                    </div>  
            </nav>
        </header>

        <main>
            <div class="container">
                <div class="row justify-content-center">
                  <div class="col-sm-12 col-lg-6">
                    <a href="#" class="btn"><i class="fa-solid fa-chevron-left"></i> Späť do zoznamu</a>
                    <h3 class="mb-3">Upraviť produkt</h3>
                    <form>
                        <div class="row">
                            <div class="form-group col-12">
                                <label for="adm-product-name">Názov:</label>
                                <input type="text" class="form-control" id="adm-product-name" value="Dobré znamenia">
                            </div>
                            <div class="form-group col-12">
                                <label for="adm-product-author">Autor:</label>
                                <input type="text" class="form-control" id="adm-product-author" value="Neil Gaiman, Terry Pratchett">
                            </div>
                                <div class="form-group col-12">
                                <label for="adm-product-description">Popis:</label>
                                <textarea class="form-control" id="adm-product-description" placeholder="">Spoločný román dvoch majstrov literárnej fantastiky. Koniec sveta sa nezadržateľne blíži. Zhromažďujú sa armády dobra a zla, z hlbín sa dvíha Atlantída, z neba padajú žaby, naplno horia vášne. Zdá sa, že všetko ide presne podľa Božieho plánu. Démon Crowley a anjel Azirafal už dlho žijú na zemi medzi smrteľníkmi a celkom si tu zvykli. Ak si chcú zachovať svoj pohodlný životný štýl, neostáva im nič iné, len odvrátiť hroziaci armagedon. Najprv však budú musieť nájsť nezvestného Antikrista.
                                
                                    Román Dobré zamenia prvý raz vyšiel v roku 1990 a v roku 2019 sa dočkal filmového spracovania v podobe rovnomenného seriálu.</textarea>
                            </div>
                            <div class="form-group col-12">
                                <label for="adm-product-price">Cena:</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" id="adm-product-price" value="13.00">
                                    <div class="input-group-append">
                                        <span class="input-group-text">&euro;</span>
                                    </div>
                                </div>
                             </div>
                             <div class="form-group col-xl-6 col-sm-12">
                                <label for="type">Typ:</label>
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" name="type[]" value="Kniha" id="kniha" checked>
                                  <label class="form-check-label" for="kniha">Kniha</label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" name="type[]" value="eKniha" id="ekniha" checked>
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
                                  <input class="form-check-input" type="checkbox" name="languages[]" value="slovensky" id="slovensky" checked>
                                  <label class="form-check-label" for="slovensky">Slovenský</label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" name="languages[]" value="anglicky" id="anglicky" checked>
                                  <label class="form-check-label" for="anglicky" >Anglický</label>
                                </div>
                              </div>
                            <div class="form-group col-xl-6 col-sm-12">
                                <label for="adm-product-genre">Žáner:</label>
                                <select class="form-control" id="adm-product-genre">
                                    <option>Detektívy</option>
                                    <option>---</option>
                                    <option>Historický</option>
                                    <option>Beletria</option>
                                    <option>Humorný</option>
                                    <option>Romantický</option>
                                    <option>Fantasy</option>
                                    <option>Sci-fi</option>  
                                    <option>Triler a horor</option>
                                    <option>Young Adult</option>
                                    <option>Pre deti</option>
                                </select>
                            </div>
                            <div class="form-group col-xl-6 col-sm-12">
                                <label for="productPages">Počet strán:</label>
                                <input type="number" class="form-control" id="productPages" value="400">
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
                                  <div id="preview-container">
                                    <img src="../res/knihy/dobreznamenia_1.jpg" alt="Kniha Dobré znamenia" class="product-image">
                                    <img src="../res/knihy/dobreznamenia_1.jpg" alt="Kniha Dobré znamenia" class="product-image">
                                  </div>      
                                </div>
                            </div>
                            
                        </div>
                        <button type="button" class="btn btn-secondary">
                           Uložiť
                        </button>
                    </form>
                </div>
            </div>
        </div>
        </main>

        
    <script src="../js/dragndrop.js"></script>    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>