export default function auth({next, to, from, store}){
 
    if(store.getters.isLoggedIn && (to.name == 'inicio')){
        return next({
            name:'menu'
        })
    }
       return next()
   }