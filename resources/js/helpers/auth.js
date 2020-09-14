import { setAuthorization } from "./auth_header";
import jwt_decode from 'jwt-decode'

export function login(credentials) {
    return new Promise((res, rej) => {
        axios.post('/api/auth/login', credentials)
            .then((response) => {
                setAuthorization(response.access_token);
                res(response.data);
                
                
            })
            .catch((err) => {
                rej(err);
            })
    })
}

export function getLocalUser() {
    const userStr = localStorage.getItem('user');

    if (!userStr) {
        return false;
    }

    return JSON.parse(userStr);
}

export function getTypeUser() {
    const typeUser = localStorage.getItem('user');
    if (!typeUser) {
        return null;
    } else {
        const decode = jwt_decode(typeUser);
        const type = decode.scopes[0];
        return type;
    }
}

export function tokenCaducidad() {
    if(localStorage.getItem("user") === null){
        return null
    }else{
        const userStr = localStorage.getItem('user');
        var convertion = JSON.parse(userStr);
        var fechaEnd = convertion.expires_at
        var fechaDeExpiracion = new Date(fechaEnd.replace(/-/g,"/"));
        let fechaTermino = fechaDeExpiracion.getDate() + "/" + (fechaDeExpiracion.getMonth() +1) + "/" + fechaDeExpiracion.getFullYear()
        return fechaTermino
    }
}
export function tokeDecodeExp(){
    const userStr = localStorage.getItem('user');
        var convertion = JSON.parse(userStr);
        const decode = jwt_decode(convertion.token);
        return decode.exp
        
          
}