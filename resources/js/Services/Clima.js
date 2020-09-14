//import API from './API'

import Axios from "axios";

//===================TABLA CURSO ==============
export function datosClima() {
    console.log("hola")
    Axios({
        method: 'GET',
        url:'http://127.0.0.1:8000/climax'
    }).then(res=>{
        console.log(res.data)
    }).catch(err =>{
        console.log(err)
    })
}

export function BusquedaApi(pais){
 
      
}