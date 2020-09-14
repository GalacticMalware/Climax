import Vue from 'vue'
import Router from 'vue-router'


//import Contacto from './components/Complementos/Contacto'
import Inicio from './components/Inicio'
import Publicaciones from './components/Complementos/Puclicaciones'
import Clima from './components/Complementos/Clima'


Vue.use(Router)

export default new Router({
    routes: [
        {
            path: "/",
            name: "inicio",
            component: Inicio
            
        },
        {
            path: "/publicaciones",
            name: "publicaciones",
            component: Publicaciones
            
        },
        {
            path: "/clima",
            name: "clima",
            component: Clima
            
        },
        {
            path: "*",
            redirect: "/"
        },
       
    ],
    mode: "history"
})
