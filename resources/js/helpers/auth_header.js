export function initialize(store, router) {
    /*
    router.beforeEach((to, from, next) => {
        const requiresAuth = to.matched.some(record => record.meta.requiresAuth);
        const currentUser = store.state.currentUser;
        //here is where 
    
        if(requiresAuth && !currentUser) {
            next('/login');
        } else if(to.path == '/login' && currentUser) {
            next('/');
        } else {
            next();
        }
    }); */
    
    axios.interceptors.response.use(null, (error) => {
        if (error.resposne.status == 401) {
            store.commit('logout');
            router.push('/login');
        }

        return Promise.reject(error);
    });

    if (store.getters.currentUser) {
        setAuthorization(store.getters.currentUser.token);
    }
}
//la configuracion para hacer la solicitudes al servidor con nuestras credenciales
export function setAuthorization(token) {
    axios.defaults.headers.common["Authorization"] = `Bearer ${token}`
    axios.defaults.headers.common["Content-Type"] = 'application/json'
    axios.defaults.headers.common["X-Requested-With"] = 'XMLHttpRequest'
}