/* CHANGE PRODUCT IMAGE FUNCTION */
function changeImage(image) {
  var displayImage = document.getElementById("main-cover");
  displayImage.src = image.src;
}

/* OPEN PRODUCT IMAGE + aby sa nescrollovalo ked je modal otvoreny */
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
  $(".owl-carousel.book-photos").owlCarousel(
    {
      autoplay:true,
      autoplayTimeout:5000,
      autoplayHoverPause:true
    }
  );
});