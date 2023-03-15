
document.getElementById('profile').onclick = (e) => {
    e.preventDefault()
    document.getElementById('profile').nextElementSibling.classList.toggle('show')      
}

document.getElementById('search-go-back').onclick = document.getElementById('open-search-sm').onclick = (e) => {
    e.preventDefault()
    document.getElementById('search-form').classList.toggle('show')
    Array.from(document.getElementsByClassName('collapse show')).forEach(element => {
        element.classList.remove('show')
    })
    document.getElementById('profile').nextElementSibling.classList.remove('show')
}

if(document.getElementById("prehlad-objednavky"))
    document.getElementById("prehlad-objednavky").firstElementChild.onclick = (e) => {
    document.getElementById("prehlad-objednavky").classList.toggle("show")
  }
 
/* HOVER FUNCTION */
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

Array.from(document.getElementsByClassName('amount-input')).forEach((element)=>{
    var changeHandeler = () =>{
        // asynchronne volanie na ulozenie zmeny kosika
        console.log('changed')
    }

    //input
    const input = element.children[1]
    input.oninput =  changeHandeler
    //decrement button
    element.children[0].children[0].onclick = (e)=>{
        e.preventDefault()
        if(input.value == 0) return;
        input.value--;
        changeHandeler()
    }
    //increment button
    element.children[2].children[0].onclick = (e)=>{
        e.preventDefault()
        input.value++;
        changeHandeler()
    }
})


$(document).ready(function(){
    $(".owl-carousel.homescreen").owlCarousel({
        stagePadding: 50,
        loop:true,
        margin:10,
        nav:true,
        responsive:{
            0:{
                items:1
            },
            600: {
                items:2
            },
            804:{
                items:4
            },
            1169:{
                items:5
            }
        },
        autoplay:true,
        autoplayTimeout:5000,
        autoplayHoverPause:true
    })
  });