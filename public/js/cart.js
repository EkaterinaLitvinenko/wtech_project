
function updateAmount(base_url,c_id,id,value){
    console.log('dispatched')
    const sum = document.getElementById('sum');
    const event = new Event("build");
    sum.dispatchEvent(event);
    if(value < 1){
        console.log(value)
        return;
    }
    axios.put(base_url+'/api/cart/'+c_id+'/change/'+id+'/to/'+value, 
    {withCredentials: true}
    )
    .then(res=>{
        console.log(res)
    })
}
