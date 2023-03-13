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