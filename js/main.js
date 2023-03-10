
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

document.getElementById('prehlad-objednavky').firstElementChild.onclick = (e)=>{
    document.getElementById('prehlad-objednavky').classList.toggle('show')
}

function changeMainBook(stars,color, img, title, author, about) {
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

    if(stars <= 3.0) {
        rating.style.content = "★★★☆☆";
    }
    else if(stars > 3 && stars <= 4.0) {
        rating.style.content = attr("★★★☆");
    }
    else if(stars > 4 && stars <= 4.5) {
        rating.style.content = attr("★★★☆");
    }
}

function countLines() {
    var el = document.getElementByClass('price');
    var divHeight = el.offsetHeight;
    var lineHeight = parseInt(el.style.lineHeight);
    var lines = divHeight / lineHeight;
    console.log(lines)
    alert("Lines: " + lines);
}