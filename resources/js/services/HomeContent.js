const axiostest = () =>{
    axios.get('https://api.github.com/users/mapbox')
    .then((response) => {
        console.log(response.data);
    })
    .catch((err)=>{
        console.log(err);
    });
}
