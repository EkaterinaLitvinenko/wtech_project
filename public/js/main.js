if(localStorage.getItem("cart")==null)
    localStorage.setItem("cart",JSON.stringify(Array()))

/* zobrazenie panela kde je button na odhlasenie */
if(document.getElementById("profile"))
document.getElementById('profile').onclick = (e) => {
    e.preventDefault()
    document.getElementById('profile').nextElementSibling.classList.toggle('show')      
}
if(document.getElementById('search-go-back'))
document.getElementById('search-go-back').onclick = document.getElementById('open-search-sm').onclick = (e) => {
    e.preventDefault()
    document.getElementById('search-form').classList.toggle('show')
    Array.from(document.getElementsByClassName('collapse show')).forEach(element => {
        element.classList.remove('show')
    })
    document.getElementById('profile').nextElementSibling.classList.remove('show')
}

/* prehlad objednavky - otvaranie na malych zariadeniach dohora */
if(document.getElementById("order-review"))
    document.getElementById("order-review").firstElementChild.onclick = (e) => {
    document.getElementById("order-review").classList.toggle("show")
  }
 
/* HOVER FUNCTION pri top knihach */
  function changeMainBook(stars,color, img, title, author, about) {
    const main_book = document.getElementById("main-book");
    const main_cover = document.getElementById("main-book-cover");
    const main_title = document.getElementById("main-book-title");
    const main_author = document.getElementById("main-book-author");
    const main_about = document.getElementById("main-book-about");
    const rating = document.getElementById("rating-inline");
  
    main_book.style.backgroundColor = color;
    main_cover.src = img;
    main_title.innerHTML = title;
    main_author.innerHTML = author;
    main_about.innerHTML = about;
  
    rating.style.setProperty('--stars-width', 123*(stars/5.0)+'px');
}


if(document.getElementById('topBooks')){
    const book = document.getElementsByClassName('onMouse')[0]
    book.onmouseover()
}

if(document.getElementById('sum')){
 const sum = document.getElementById('sum');
 const event = new Event("build");
 sum.addEventListener('build',(e)=>{
    total = 0;
    Array.from(document.getElementById('cart-form').getElementsByTagName('article')).forEach(
        item =>{
            total+= item.getElementsByTagName('input')[0].value *item.lastElementChild.getAttribute('data-price');
        }
    )
    console.log(total)
    sum.innerHTML=(total.toFixed(2));
 })
 sum.dispatchEvent(event)
}

/* pridavanie a znizovanie mnozstva produktu */
Array.from(document.getElementsByClassName('amount-input')).forEach((element)=>{

    //input
    const input = element.children[1]
    const sum = document.getElementById('sum');

    //decrement button
    element.children[0].children[0].onclick = (e)=>{
        e.preventDefault()
        if(input.value == 1) return;
        input.value--;
        input.onchange()
    }
    //increment button
    element.children[2].children[0].onclick = (e)=>{
        e.preventDefault()
        input.value++;
        input.onchange()
    }
})



/* corousel na hlavnej stranke */
$(document).ready(function(){
    $(".owl-carousel.homescreen").owlCarousel({
        stagePadding: 50,
        loop:true,
        margin:10,
        responsive:{
            0:{
                items:1
            },
            505: {
                items:2
            },
            663: {
                items:3
            },
            830:{
                items:4
            },
            1000:{
                items:5
            },
            1370:{
                items:6
            },
        },
        autoplay:true,
        autoplayTimeout:5000,
        autoplayHoverPause:true
    })
  });

  /*menenie aktivneho linku v katalogu*/
  $(function(){
    $('#order-by li a').filter(function(){return this.href==location.href}).parent().addClass('active').siblings().removeClass('active')
    $('#order-by li a').click(function(){
        $(this).parent().addClass('active').siblings().removeClass('active')    
    })
})