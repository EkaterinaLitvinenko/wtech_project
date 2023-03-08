
document.getElementById('profile').onclick = (e) => {
    e.preventDefault()
    console.log('hre')
    document.getElementById('profile').nextElementSibling.classList.toggle('show')
        
}

document.getElementById('search-go-back').onclick = document.getElementById('open-search-sm').onclick = (e) => {
    e.preventDefault()
    document.getElementById('search-form').classList.toggle('show')
    Array.from(document.getElementsByClassName('collapse show')).forEach(element => {
        console.log('here')
        element.classList.remove('show')
    })
    document.getElementById('profile').nextElementSibling.classList.remove('show')
}