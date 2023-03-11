
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
 
  /* RATING FUNCTION */
  function getRating(stars) {
    console.log("hey")
    const rating = document.getElementById("rating-inline");
    rating.style.setProperty('--stars-width', 123*(stars/5.0)+'px');
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

/* PRODUCT QUANTITY FUNCTIONS */
function incrementValue(e) {
    e.preventDefault();
    var fieldName = $(e.target).data('field');
    var parent = $(e.target).closest('div');
    var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);

    if (!isNaN(currentVal)) {
        parent.find('input[name=' + fieldName + ']').val(currentVal + 1);
    } else {
        parent.find('input[name=' + fieldName + ']').val(0);
    }
}

function decrementValue(e) {
    e.preventDefault();
    var fieldName = $(e.target).data('field');
    var parent = $(e.target).closest('div');
    var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);

    if (!isNaN(currentVal) && currentVal > 0) {
        parent.find('input[name=' + fieldName + ']').val(currentVal - 1);
    } else {
        parent.find('input[name=' + fieldName + ']').val(0);
    }
}

$('.input-group').on('click', '.button-plus', function(e) {
    incrementValue(e);
});

$('.input-group').on('click', '.button-minus', function(e) {
    decrementValue(e);
});

/* CHANGE PRODUCT IMAGE FUNCTION */

function changeImage(path){
    console.log("a")
    const main_cover = document.getElementById("main-cover");
    main_cover.src = path;
}

/* OPEN PRODUCT IMAGE */
var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("main-cover");
var modalImg = document.getElementById("img01");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}







function countLines() {
    var el = document.getElementByClass('price');
    var divHeight = el.offsetHeight;
    var lineHeight = parseInt(el.style.lineHeight);
    var lines = divHeight / lineHeight;
    console.log(lines)
    alert("Lines: " + lines);
}