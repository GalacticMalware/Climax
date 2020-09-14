export default function auth({next, to, store}){

    if(store.getters.isLoggedIn){
        if(to.path == '/'){
            return next({
                name: 'menu'
            })
        }
        return next()
}else{
    return next('inicio')
}

}