require('./bootstrap');


import Vue from 'vue'
import Vuetify from 'vuetify'
import Route from './Route'

//import Vuex from 'vuex'
//import Store from '../js/store/auth'

Vue.use(Vuetify)
//vue.use(Vuex)

import App from './components/App'
import Login from './components/Auth/Login'

const login = new Vue({
    el: '#login',
    components: Login,
    render: h => h(Login),
    //store: Store
});

const app = new Vue({
    el: '#app',
    components: App,
    render: h => h (App),
    router: Route,
})

/*const app = new Vue({
    el:'#app'
});*/

export default app;