/* CHANGE PRODUCT IMAGE FUNCTION */
function changeImage(path){
    const main_cover = document.getElementById("main-cover");
    main_cover.src = path;
}

/* OPEN PRODUCT IMAGE */
var modal = document.getElementById("myModal");
var img = document.getElementById("main-cover");
var modalImg = document.getElementById("img01");
var body = document.getElementsByTagName("BODY")[0];
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  body.style.overflow = "hidden";
}

var span = document.getElementsByClassName("close")[0];
span.onclick = function() {
  modal.style.display = "none";
  body.style.overflow = "auto";
}


/* carousel produktov */
$(document).ready(function(){
  $(".owl-carousel.book-photos").owlCarousel();
});