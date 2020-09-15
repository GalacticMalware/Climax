<template>
  <v-app id="inspire">
    <v-toolbar style dark fixed app clipped-right>
      <v-toolbar-side-icon v-show="!ACtivarApp" @click.stop="drawer = !drawer"></v-toolbar-side-icon>
      <v-toolbar-title style class="white--text">Climax</v-toolbar-title>
      <v-spacer></v-spacer>
      <v-toolbar-title style class="white--text">

<v-layout >
         <v-menu offset-y>
      <template v-slot:activator="{ on }">
        <v-btn
          flat icon
          v-on="on"
        >
          <v-icon>mobile_screen_share</v-icon>
        </v-btn>
      </template>
      <v-list>
        <v-list-tile
        >
             <v-switch
              v-model="ACtivarApp"
              :label="`Modolo App: ${SwitchApp}`"
              ></v-switch>
        
        </v-list-tile>
         <v-list-tile
         @click="instalacion = true"
        >
        <v-list-tile-title >
          <v-icon>stay_primary_portrait</v-icon> Instalar
        </v-list-tile-title>
        </v-list-tile>
      </v-list>
    </v-menu>

        <v-menu offset-y>
      <template v-slot:activator="{ on }">
        <v-btn
          flat icon
          v-on="on"
          
        >
          <v-icon>account_circle</v-icon>
        </v-btn>
      </template>
      <v-list>
        <v-list-tile
          @click="Logout"
        >
          <v-list-tile-title>Cerrar sesion</v-list-tile-title>
        </v-list-tile>
      </v-list>
    </v-menu>
</v-layout>
      </v-toolbar-title>
    </v-toolbar>
    <v-navigation-drawer v-model="drawer" fixed app>
      <v-img :aspect-ratio="16/9" src="https://i.ytimg.com/vi/U1sea1pbr2k/maxresdefault.jpg">
        <v-layout pa-2 column fill-height class="lightbox white--text">
          <v-spacer></v-spacer>
          <v-toolbar flat class="transparent">
            <v-list class="pa-0">
              <v-list-tile avatar>
                <v-list-tile-avatar>
                  <img
                    src="https://scontent.felp1-1.fna.fbcdn.net/v/t31.0-8/17097297_411700532508617_8500144477865061665_o.jpg?_nc_cat=107&_nc_sid=09cbfe&_nc_ohc=TAntAiRfXGAAX8ORaC2&_nc_ht=scontent.felp1-1.fna&oh=62fc8ae144a83fa9fd34237218102edb&oe=5F82D7BB"
                  />
                </v-list-tile-avatar>

                <v-list-tile-content>
                  <v-list-tile-title class="white--text">{{usuarioNombre}}</v-list-tile-title>
                </v-list-tile-content>
              </v-list-tile>
            </v-list>
          </v-toolbar>
        </v-layout>
      </v-img>


      <v-list dense >
        <v-list-tile @click="boton= true" router-link :to="{ path: '/' }" class="text-decoration-none">
          <v-list-tile-action>
            <v-icon>home</v-icon>
          </v-list-tile-action>
          <v-list-tile-content>
            <v-list-tile-title>Inicio</v-list-tile-title>
          </v-list-tile-content>
        </v-list-tile>
      </v-list>
      <v-list dense>
        <v-list-tile @click="boton= true" router-link :to="{ path: '/publicaciones' }" class="text-decoration-none">
          <v-list-tile-action>
            <v-icon>collections</v-icon>
          </v-list-tile-action>
          <v-list-tile-content>
            <v-list-tile-title>Mis publicaciones</v-list-tile-title>
          </v-list-tile-content>
        </v-list-tile>
      </v-list>
      <v-list dense>
        <v-list-tile @click="boton= true" router-link :to="{ path: '/clima' }" class="text-decoration-none">
          <v-list-tile-action>
            <v-icon>flare</v-icon>
          </v-list-tile-action>
          <v-list-tile-content>
            <v-list-tile-title>Clima</v-list-tile-title>
          </v-list-tile-content>
        </v-list-tile>
      </v-list>
    </v-navigation-drawer>
    <v-navigation-drawer v-model="left" temporary fixed></v-navigation-drawer>
    <v-content>
      <router-view></router-view>
    </v-content>

    <v-dialog width="500" v-model="instalacion">
      <v-card >
    <v-stepper v-model="e1">
    <v-stepper-header>
      <v-stepper-step :complete="e1 > 1" step="1">Paso 1</v-stepper-step>

      <v-divider></v-divider>

      <v-stepper-step :complete="e1 > 2" step="2">Paso 2</v-stepper-step>

      <v-divider></v-divider>

      <v-stepper-step step="3">Paso 3</v-stepper-step>
    </v-stepper-header>

    <v-stepper-items>
      <v-stepper-content step="1">
        <v-card
          class="mb-5"
          color="grey lighten-1"
          height="200px"
        ></v-card>

        <v-btn
          color="primary"
          @click="e1 = 2"
        >
          Continuar
        </v-btn>

       <v-btn color="error" @click="instalacion=false ">Salir</v-btn>
      </v-stepper-content>

      <v-stepper-content step="2">
        <v-card
          class="mb-5"
          color="grey lighten-1"
          height="200px"
        ></v-card>

        <v-btn
          color="primary"
          @click="e1 = 3"
        >
          Continuar
        </v-btn>

        <v-btn color="error" @click="instalacion=false ">Salir</v-btn>
      </v-stepper-content>

      <v-stepper-content step="3">
        <v-card
          class="mb-5"
          color="grey lighten-1"
          height="200px"
        ></v-card>

        <v-btn
          color="primary"
          @click="e1 = 1"
        >
          Continuar
        </v-btn>

        <v-btn color="error" @click="instalacion=false ">Salir</v-btn>
      </v-stepper-content>
    </v-stepper-items>
  </v-stepper>
      </v-card>
    </v-dialog>



<template v-if="ACtivarApp">
     <v-card height="200px">
    <v-bottom-nav
      :active.sync="bottomNav"
      :color="color"
      :value="true"
      
      fixed app
      dark
      shift
    >
      <v-btn dark router-link :to="{ path: '/' }" class="text-decoration-none">
        <span>Inicio</span>
        <v-icon>home</v-icon>
      </v-btn>

      <v-btn dark router-link :to="{ path: '/publicaciones' }" class="text-decoration-none">
        <span>Publicaciones</span>
        <v-icon>collections</v-icon>
      </v-btn>

      <v-btn dark router-link :to="{ path: '/clima' }" class="text-decoration-none">
        <span>Clima</span>
        <v-icon>flare</v-icon>
      </v-btn>

      <v-btn dark class="text-decoration-none">
        <span>Perfil</span>
        <v-icon>account_circle</v-icon>
      </v-btn>
    </v-bottom-nav>
  </v-card>
</template>
  
  </v-app>
</template>

<script>
import Axios from "axios";
export default {
  data() {
    return {
      e1:0,
      bottomNav: 0,
      ACtivarApp:false,
      boton: false,
      drawer: null,
      drawerRight: null,
      right: false,
      left: false,
      usuarioNombre:'',
      instalacion:false,
    }
  },
  computed: {
    color () {
        switch (this.bottomNav) {
          case 0: return 'blue-grey'
          case 1: return 'teal'
          case 2: return 'brown'
          case 3: return 'primary'
        }
      },
      SwitchApp(){
        return this.ACtivarApp === false ? " ACTIVADO" : " DESACTIVADO";
      }
    },mounted() {
    axios({
      method: "GET",
      url: "http://127.0.0.1:8000/usuarioNombre",
    })
      .then((res) => {
        this.usuarioNombre = res.data;
      })
      .catch((err) => {
      });
  },
  props: {
    source: String,
  },
  methods:{
    Logout(){
      axios({
      method: "post",
      url: "http://127.0.0.1:8000/logout",
    })
      .then((res) => {
        document.location.href='/'
        //document.location.reload(true);
      })
      .catch((err) => {
      });
    }
  }
};
</script>
