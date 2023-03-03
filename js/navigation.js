
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