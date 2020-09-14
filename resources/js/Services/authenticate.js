
export function login(credentials) {
    //console.log(credentials)
    return new Promise((res, reject) => {
        axios.post('/login', credentials)
            .then((response) => {
                res(response);
            })
            .catch((err) => {
                reject(err);
            })
    })
}


export function registro(credentials) {
    //console.log(credentials)
    return new Promise((res, reject) => {
        axios.post('/register', credentials)
            .then((response) => {
                res(response);
            })
            .catch((err) => {
                reject(err);
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

