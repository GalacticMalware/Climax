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

export function imagenUp(files){
    console.log(files)
    return new Promise((res,reject)=>{
        axios.post('/imagenFile',{
            'imagen':file
        }).then(response=>{
            console.log(response)
            res(response)
        }).catch(err =>{
            console.log(err)
            reject(err)
        })
    })
}


export function auth() {
    //console.log(credentials)
    return new Promise((res, reject) => {
        axios.get('/autendicado')
            .then((response) => {
                res(response);
            })
            .catch((err) => {
                reject(err);
            })
    })
}

