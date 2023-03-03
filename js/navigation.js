
$(document).ready(()=>{

$('#profile').click((e)=>{
    e.preventDefault()
    $('#profile').next().css("display", "block")
})


$('#open-search-sm').click((e)=>{
    e.preventDefault()
    $('#search-form').addClass('show')

})

$('#search-go-back').click((e)=>{
    e.preventDefault()
    $('#search-form').removeClass('show')
})

})