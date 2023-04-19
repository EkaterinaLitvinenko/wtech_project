@extends ("./layouts/adminLayout")


<main>
        <!----------filter ---------------------------------------------------------------->
        <aside id="sidebar-filter">
            <span id="sidebar-open" class="fa-solid fa-chevron-right"></span>
            <form id="filter-form">
            <fieldset class="side-menu">
                <legend class="nav-item-title">Typ</legend>
                <ul class="sub-menu">
                    <li class="sub-item">
                        <label for="type-kniha"><input type="checkbox" id="type-kniha">Kniha</label>
                    </li>
                    <li class="sub-item">
                        <label for="type-ekniha"><input type="checkbox" id="type-ekniha">eKniha</label>
                    </li>
                    <li class="sub-item">
                        <label for="type-audiokniha"><input type="checkbox" id="type-audiokniha">Audiokniha</label>
                    </li>
                </ul>
            </fieldset>
                        
            <fieldset class="side-menu">
                <legend class="nav-item-title">Žáner</legend>
                <ul class="sub-menu">
                    <li class="sub-item">
                        <label for="genre-his"><input type="checkbox" id="genre-his">Historický</label>
                    </li>
                    <li class="sub-item">
                        <label for="genre-bel"><input type="checkbox" id="genre-bel">Beletria</label>
                    </li>
                    <li class="sub-item">
                        <label for="genre-hum"><input type="checkbox" id="genre-hum">Humorný</label>
                    </li>
                    <li class="sub-item">
                        <label for="genre-ro"><input type="checkbox" id="genre-rom">Romantický</label>
                    </li>
                    <li class="sub-item">
                        <label for="genre-fan"><input type="checkbox" id="genre-fan">Fantasy</label>
                    </li>
                    <li class="sub-item">
                        <label for="genre-sci"><input type="checkbox" id="genre-sci">Sci-fi</label>
                    </li>
                    <li class="sub-item">
                        <label for="genre-det"><input type="checkbox" id="genre-det">Detektívy</label>
                    </li>
                    <li class="sub-item">
                        <label for="genre-tri"><input type="checkbox" id="genre-tri">Triler a horor</label>
                    </li>
                    <li class="sub-item">
                        <label for="genre-you"><input type="checkbox" id="genre-you">Young Adult</label>
                    </li>
                    <li class="sub-item">
                        <label for="genre-pdet"><input type="checkbox" id="genre-pdet">Pre deti</label>
                    </li>
                </ul>           
            </fieldset>             
            
            <fieldset class="side-menu">
                    <legend class="nav-item-title">Jazyk</legend>
                    <ul class="sub-menu">        
                        <li class="sub-item">
                            <label for="lang-sk"><input type="checkbox" id="lang-sk">slovenský</label>
                        </li>
                        <li class="sub-item">
                            <label for="lang-en"><input type="checkbox" id="lang-en">anglický</label>
                        </li>
                    </ul>
            </fieldset>
        
            <button type="button" class="btn btn-dark" id="apply-btn">Aplikovať parametre</button>
            <button type="button" class="btn btn-dark" id="cancel-btn">Zrusiť parametre</button>     
            </form>
                                
        </aside>                       
        
            
        <div class="content-container">
            <div class="adm-prodlist">
            <!----------table header -->
                    <div class="adm-prodlist-header">
                        <h3>Zoznam produktov</h3>
                        <div class="adm-tools">
                            <a href="#" id="open-search-sm"><span class="fa-solid fa-magnifying-glass clickable" title="open search" ></span></a>
                            <form  id="search-form">
                                <div class="input-group ">
                                    <div class="input-group-prepend">
                                        <a href="#" id="search-go-back" class="input-group-text"><span class="fa-solid fa-arrow-left" ></span></a>
                                    </div>
                                    <input class="form-control" type="search" placeholder="Search" aria-label="Search" id="search-input">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-success" type="submit"><span class="fa-solid fa-magnifying-glass" title="search button"></span></button>
                                    </div>
                                </div>
                            </form>
                            <button type="button" class="btn btn-dark" id="add-btn">Pridať</button>
                        </div>
                    
                    </div>
                

            <!----------table body -->
                    <div class="adm-prodlist-body">

                        <div class="prodlist-table">
                            <div class="row prodlist-table-head">
                                <div class="col-xl-2 col-md-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="check-all">
                                        <label class="form-check-label" for="check-all"></label>
                                        <span id="adm-table-name">Názov</span>      
                                    </div>  
                                        
                                </div>
                                <div class="col-xl-5 col-md-3">
                                    
                                </div>
                                <div class="col-xl-1 col-md-2">
                                    <span>ID</span>
                                </div>
                                <div class="col-xl-1 col-md-2">
                                    <span>Cena</span>
                                </div>
                                <div class="col-xl-1 col-md-2">
                                    <span>Žáner</span>
                                </div>
                                <div class="col-xl-2 col-md-1">Možnosti</span>
                                </div>
                            </div>

                            <div class="row product-item">
                                <div class="col-xl-2 col-md-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1"></label>
                                        <img src="../res/knihy/dobreznamenia_1.jpg" alt="Kniha Dobré znamenia" class = "adm-book-cover">
                                    </div>
                                </div>
                                <div class="col-xl-5 col-md-3">
                                    <span class="adm-book-name">  I'll Be Watching You: Inside The Police, 1980-83
                                        Andy Summers </span>
                                </div>
                                <div class="col-xl-1 col-md-2">
                                    <span class="adm-book-id">55813384</span> </td>
                                </div>
                                <div class="col-xl-1 col-md-2">
                                    <span class="adm-book-price">13,00€</span>
                                </div>
                                <div class="col-xl-1 col-md-2">
                                    <span class="adm-book-genre">Fantasy</span>
                                </div>
                                <div class="col-xl-2 col-md-1">
                                    <div class="action-btn">
                                        <button class="detail-btn"><i class="fa-solid fa-eye"></i></button>
                                        <a href="#" class="edit-btn"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <button class="delete-btn"><i class="fa-solid fa-trash"></i></button></button>
                                    </div>  
                                </div>
                            </div>
                            <!-- collapsible div ------------------------------------------------->
                            <div class="col-12 product-detail">
                                    <div class="collapse">
                                    <div class="card card-body">
                                        <img src="../res/knihy/dobreznamenia_1.jpg" alt="Kniha Dobré znamenia" class="product-image">
                                        <div class="product-info">
                                        <label for="product-title">Názov:</label>
                                        <span class="product-title">Dobré znamenia</span><br>
                                        <label for="product-autors">Autori:</label>
                                        <span class="product-autors">Neil Gaiman, Terry Pratchett</span><br>
                                        <label for="product-languages">Typ:</label>
                                        <span class="product-languages">Kniha, eKniha</span><br>
                                        <label for="product-languages">Jazyky:</label>
                                        <span class="product-languages">slovenčina</span><br>
                                        <label for="product-pages">Pocet strán:</label>
                                        <span class="product-pages">400</span><br>
                                        <label for="product-description">Popis:</label>
                                        <p class="product-description">Spoločný román dvoch majstrov literárnej fantastiky.
                                            Koniec sveta sa nezadržateľne blíži. Zhromažďujú sa armády dobra a zla, z hlbín sa
                                                dvíha Atlantída, z neba padajú žaby, naplno horia vášne. Zdá sa, že všetko ide presne 
                                                podľa Božieho plánu. Démon Crowley a anjel Azirafal už dlho žijú na zemi medzi smrteľníkmi 
                                                a celkom si tu zvykli. Ak si chcú zachovať svoj pohodlný životný štýl, neostáva im nič iné, 
                                                len odvrátiť hroziaci armagedon. Najprv však budú musieť nájsť nezvestného Antikrista.
                                            
                                            Román Dobré zamenia prvý raz vyšiel v roku 1990 a v roku 2019 sa dočkal filmového spracovania 
                                            v podobe rovnomenného seriálu.</p> 
                                        </div>
                                    </div>
                                    </div>
                                </div>



                        <div class="row product-item">
                            <div class="col-xl-2 col-md-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                    <label class="form-check-label" for="defaultCheck1"></label>
                                    <img src="../res/knihy/bitunokc5_1.jpg" alt="Kniha Dobré znamenia" class = "adm-book-cover">
                                </div>
                            </div>
                            <div class="col-xl-5 col-md-10">
                                <span class="adm-book-name">  I'll Be Watching You: Inside The Police, 1980-83
                                    Andy Summers </span>
                            </div>
                            <div class="col-xl-1 col-md-3">
                                <span class="adm-book-id">55813384</span> </td>
                            </div>
                            <div class="col-xl-1 col-md-3">
                                <span class="adm-book-price">13,00€</span>
                            </div>
                            <div class="col-xl-1 col-md-3">
                                <span class="adm-book-genre">Fantasy</span>
                            </div>
                            <div class="col-xl-2 col-md-3">
                                <div class="action-btn">
                                    <button class="detail-btn"><i class="fa-solid fa-eye"></i></button>
                                    <a href="#" class="edit-btn"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <button class="delete-btn"><i class="fa-solid fa-trash"></i></button></button>
                                </div>  
                            </div>
                        </div>
                        <!-- collapsible div ------------------------------------------------->
                        <div class="col-12 product-detail">
                                <div class="collapse">
                                <div class="card card-body">
                                    <img src="../res/knihy/bitunokc5_1.jpg" alt="Kniha Dobré znamenia" class="product-image">
                                    <div class="product-info">
                                    <label for="product-title">Názov:</label>
                                    <span class="product-title">Dobré znamenia</span><br>
                                    <label for="product-autors">Autori:</label>
                                    <span class="product-autors">Neil Gaiman, Terry Pratchett</span><br>
                                    <label for="product-languages">Typ:</label>
                                    <span class="product-languages">Kniha, eKniha</span><br>
                                    <label for="product-languages">Jazyky:</label>
                                    <span class="product-languages">slovenčina</span><br>
                                    <label for="product-pages">Pocet strán:</label>
                                    <span class="product-pages">400</span><br>
                                    <label for="product-description">Popis:</label>
                                    <p class="product-description">Spoločný román dvoch majstrov literárnej fantastiky.
                                        Koniec sveta sa nezadržateľne blíži. Zhromažďujú sa armády dobra a zla, z hlbín sa
                                            dvíha Atlantída, z neba padajú žaby, naplno horia vášne. Zdá sa, že všetko ide presne 
                                            podľa Božieho plánu. Démon Crowley a anjel Azirafal už dlho žijú na zemi medzi smrteľníkmi 
                                            a celkom si tu zvykli. Ak si chcú zachovať svoj pohodlný životný štýl, neostáva im nič iné, 
                                            len odvrátiť hroziaci armagedon. Najprv však budú musieť nájsť nezvestného Antikrista.
                                        
                                        Román Dobré zamenia prvý raz vyšiel v roku 1990 a v roku 2019 sa dočkal filmového spracovania 
                                        v podobe rovnomenného seriálu.</p> 
                                    </div>
                                </div>
                                </div>
                            </div>


                            <div class="row product-item">
                                <div class="col-xl-2 col-md-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1"></label>
                                        <img src="../res/knihy/thethursdaymurderclub_1.jpg" alt="Kniha Dobré znamenia" class = "adm-book-cover">
                                    </div>
                                </div>
                                <div class="col-xl-5 col-md-10">
                                    <span class="adm-book-name">  I'll Be Watching You: Inside The Police, 1980-83
                                        Andy Summers </span>
                                </div>
                                <div class="col-xl-1 col-md-3">
                                    <span class="adm-book-id">55813384</span> </td>
                                </div>
                                <div class="col-xl-1 col-md-3">
                                    <span class="adm-book-price">13,00€</span>
                                </div>
                                <div class="col-xl-1 col-md-3">
                                    <span class="adm-book-genre">Fantasy</span>
                                </div>
                                <div class="col-xl-2 col-md-3">
                                    <div class="action-btn">
                                        <button class="detail-btn"><i class="fa-solid fa-eye"></i></button>
                                        <a href="#" class="edit-btn"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <button class="delete-btn"><i class="fa-solid fa-trash"></i></button></button>
                                    </div>  
                                </div>
                            </div>
                            <!-- collapsible div ------------------------------------------------->
                            <div class="col-12 product-detail">
                                    <div class="collapse">
                                    <div class="card card-body">
                                        <img src="../res/knihy/thethursdaymurderclub_1.jpg" alt="Kniha Dobré znamenia" class="product-image">
                                        <div class="product-info">
                                        <label for="product-title">Názov:</label>
                                        <span class="product-title">Dobré znamenia</span><br>
                                        <label for="product-autors">Autori:</label>
                                        <span class="product-autors">Neil Gaiman, Terry Pratchett</span><br>
                                        <label for="product-languages">Typ:</label>
                                        <span class="product-languages">Kniha, eKniha</span><br>
                                        <label for="product-languages">Jazyky:</label>
                                        <span class="product-languages">slovenčina</span><br>
                                        <label for="product-pages">Pocet strán:</label>
                                        <span class="product-pages">400</span><br>
                                        <label for="product-description">Popis:</label>
                                        <p class="product-description">Spoločný román dvoch majstrov literárnej fantastiky.
                                            Koniec sveta sa nezadržateľne blíži. Zhromažďujú sa armády dobra a zla, z hlbín sa
                                                dvíha Atlantída, z neba padajú žaby, naplno horia vášne. Zdá sa, že všetko ide presne 
                                                podľa Božieho plánu. Démon Crowley a anjel Azirafal už dlho žijú na zemi medzi smrteľníkmi 
                                                a celkom si tu zvykli. Ak si chcú zachovať svoj pohodlný životný štýl, neostáva im nič iné, 
                                                len odvrátiť hroziaci armagedon. Najprv však budú musieť nájsť nezvestného Antikrista.
                                            
                                            Román Dobré zamenia prvý raz vyšiel v roku 1990 a v roku 2019 sa dočkal filmového spracovania 
                                            v podobe rovnomenného seriálu.</p> 
                                        </div>
                                    </div>
                                    </div>
                                </div>


                            <div class="row product-item">
                                <div class="col-xl-2 col-md-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1"></label>
                                        <img src="../res/knihy/panprstenov3_1.jpg"  alt="Kniha Dobré znamenia" class = "adm-book-cover">
                                    </div>
                                </div>
                                <div class="col-xl-5 col-md-10">
                                    <span class="adm-book-name">  I'll Be Watching You: Inside The Police, 1980-83
                                        Andy Summers </span>
                                </div>
                                <div class="col-xl-1 col-md-3">
                                    <span class="adm-book-id">55813384</span> </td>
                                </div>
                                <div class="col-xl-1 col-md-3">
                                    <span class="adm-book-price">13,00€</span>
                                </div>
                                <div class="col-xl-1 col-md-3">
                                    <span class="adm-book-genre">Fantasy</span>
                                </div>
                                <div class="col-xl-2 col-md-3">
                                    <div class="action-btn">
                                        <button class="detail-btn"><i class="fa-solid fa-eye"></i></button>
                                        <a href="#" class="edit-btn"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <button class="delete-btn"><i class="fa-solid fa-trash"></i></button></button>
                                    </div>  
                                </div>
                            </div>
                            <!-- collapsible div ------------------------------------------------->
                            <div class="col-12 product-detail">
                                    <div class="collapse">
                                    <div class="card card-body">
                                        <img src="../res/knihy/panprstenov3_1.jpg"  alt="Kniha Dobré znamenia" class="product-image">
                                        <div class="product-info">
                                        <label for="product-title">Názov:</label>
                                        <span class="product-title">Dobré znamenia</span><br>
                                        <label for="product-autors">Autori:</label>
                                        <span class="product-autors">Neil Gaiman, Terry Pratchett</span><br>
                                        <label for="product-languages">Typ:</label>
                                        <span class="product-languages">Kniha, eKniha</span><br>
                                        <label for="product-languages">Jazyky:</label>
                                        <span class="product-languages">slovenčina</span><br>
                                        <label for="product-pages">Pocet strán:</label>
                                        <span class="product-pages">400</span><br>
                                        <label for="product-description">Popis:</label>
                                        <p class="product-description">Spoločný román dvoch majstrov literárnej fantastiky.
                                            Koniec sveta sa nezadržateľne blíži. Zhromažďujú sa armády dobra a zla, z hlbín sa
                                                dvíha Atlantída, z neba padajú žaby, naplno horia vášne. Zdá sa, že všetko ide presne 
                                                podľa Božieho plánu. Démon Crowley a anjel Azirafal už dlho žijú na zemi medzi smrteľníkmi 
                                                a celkom si tu zvykli. Ak si chcú zachovať svoj pohodlný životný štýl, neostáva im nič iné, 
                                                len odvrátiť hroziaci armagedon. Najprv však budú musieť nájsť nezvestného Antikrista.
                                            
                                            Román Dobré zamenia prvý raz vyšiel v roku 1990 a v roku 2019 sa dočkal filmového spracovania 
                                            v podobe rovnomenného seriálu.</p> 
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row product-item">
                                <div class="col-xl-2 col-md-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1"></label>
                                        <img src="../res/knihy/rozpravanieopsikoviamacicke_1.jpg" alt="Kniha Dobré znamenia" class = "adm-book-cover">
                                    </div>
                                </div>
                                <div class="col-xl-5 col-md-10">
                                    <span class="adm-book-name">  I'll Be Watching You: Inside The Police, 1980-83
                                        Andy Summers </span>
                                </div>
                                <div class="col-xl-1 col-md-3">
                                    <span class="adm-book-id">55813384</span> </td>
                                </div>
                                <div class="col-xl-1 col-md-3">
                                    <span class="adm-book-price">13,00€</span>
                                </div>
                                <div class="col-xl-1 col-md-3">
                                    <span class="adm-book-genre">Fantasy</span>
                                </div>
                                <div class="col-xl-2 col-md-3">
                                    <div class="action-btn">
                                        <button class="detail-btn"><i class="fa-solid fa-eye"></i></button>
                                        <a href="#" class="edit-btn"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <button class="delete-btn"><i class="fa-solid fa-trash"></i></button></button>
                                    </div>  
                                </div>
                            </div>
                            <!-- collapsible div ------------------------------------------------->
                            <div class="col-12 product-detail">
                                    <div class="collapse">
                                    <div class="card card-body">
                                        <img src="../res/knihy/rozpravanieopsikoviamacicke_1.jpg" alt="Kniha Dobré znamenia" class="product-image">
                                        <div class="product-info">
                                        <label for="product-title">Názov:</label>
                                        <span class="product-title">Dobré znamenia</span><br>
                                        <label for="product-autors">Autori:</label>
                                        <span class="product-autors">Neil Gaiman, Terry Pratchett</span><br>
                                        <label for="product-languages">Typ:</label>
                                        <span class="product-languages">Kniha, eKniha</span><br>
                                        <label for="product-languages">Jazyky:</label>
                                        <span class="product-languages">slovenčina</span><br>
                                        <label for="product-pages">Pocet strán:</label>
                                        <span class="product-pages">400</span><br>
                                        <label for="product-description">Popis:</label>
                                        <p class="product-description">Spoločný román dvoch majstrov literárnej fantastiky.
                                            Koniec sveta sa nezadržateľne blíži. Zhromažďujú sa armády dobra a zla, z hlbín sa
                                                dvíha Atlantída, z neba padajú žaby, naplno horia vášne. Zdá sa, že všetko ide presne 
                                                podľa Božieho plánu. Démon Crowley a anjel Azirafal už dlho žijú na zemi medzi smrteľníkmi 
                                                a celkom si tu zvykli. Ak si chcú zachovať svoj pohodlný životný štýl, neostáva im nič iné, 
                                                len odvrátiť hroziaci armagedon. Najprv však budú musieť nájsť nezvestného Antikrista.
                                            
                                            Román Dobré zamenia prvý raz vyšiel v roku 1990 a v roku 2019 sa dočkal filmového spracovania 
                                            v podobe rovnomenného seriálu.</p> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


            <!----------table footer -->
                <div class="adm-prodlist-footer">          
                    
                    <nav class="adm-pagination" aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                            </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                            <li class="page-item"><a class="page-link" href="#">...</a></li>
                            <li class="page-item"><a class="page-link" href="#">8</a></li>
                            <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                            </a>
                            </li>
                        </ul>
                    </nav>
                    <div class="items-count">
                        <span class="items-count-txt">
                            Položiek na stránke
                        </span>
    
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            10
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">20</a>
                            <a class="dropdown-item" href="#">30</a>
                            </div>
                        </div>   
                    </div>
                </div>                
            </div>
        </div>  
</main>

    <script src="../js/product_detail.js"></script>
    <script src="../js/delete_item.js"></script>
    <script src="../js/checkbox.js"></script> 
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>