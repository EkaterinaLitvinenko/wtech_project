
$(document).ready(()=>{

$('#profile').click((e)=>{
    e.preventDefault()
    console.log('here')
    if($('#profile').next().hasClass('show'))
        $('#profile').next().removeClass('show')
    else
    $('#profile').next().addClass('show')
})

$('#open-search-sm').click((e)=>{
    e.preventDefault()
    console.log('hre')
    $('#search-form').addClass('show')
    $('.collapse.show').removeClass('show')
    $('.profile-group form').removeClass('show')

})

$('#search-go-back').click((e)=>{
    e.preventDefault()
    $('#search-form').removeClass('show')
})

})

function changeMainBook(img, title, author, about) {
  const main_cover = document.getElementById("main-book-cover");
  const main_title = document.getElementById("main-book-title");
  const main_author = document.getElementById("main-book-author");
  const main_about = document.getElementById("main-book-about");
  console.log(main_cover)
  main_cover.src = img;
  main_title.innerHTML = title;
  main_author.innerHTML = author;
  main_about.innerHTML = about;
  console.log(main_cover.src, main_title.innerHTML)
}