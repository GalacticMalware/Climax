<template>
<div>
  <v-container grid-list-lg text-lg-center>
    <v-layout row wrap>
      
      
      <v-flex xs12 md6 lg4 >
      <v-card>
        <v-img
          src="https://cdn.vuetifyjs.com/images/cards/sunshine.jpg"
          height="200px"
        >
        </v-img>
        <v-card-title primary-title>
          <div>
            <div class="headline">Autor: Daniel Alejandro</div>
          </div>
        </v-card-title>

        <v-card-actions>
            <v-spacer></v-spacer>
          <font size="4" class="grey--text"><v-icon>flare</v-icon> 30`c</font> <v-spacer></v-spacer>
          <font size="4" class="grey--text"><v-icon>map</v-icon> Tuxtla Gutierrez</font>
          <v-spacer></v-spacer>
          <v-btn icon @click="show = !show">
            <v-icon>{{ show ? 'keyboard_arrow_down' : 'keyboard_arrow_up' }}</v-icon>
          </v-btn>
        </v-card-actions>

        <v-slide-y-transition>
          <v-card-text v-show="show">
            <font size="3">POST:Primera prueba hola como estas nskdnjksjdnfkjsdn</font>
            </v-card-text>
        </v-slide-y-transition>
      </v-card> 
      </v-flex>

<v-flex xs12 md6 lg4 >
      <v-card>
        <v-img
          src="https://i.ytimg.com/vi/OCJ68jjSGkU/maxresdefault.jpg"
          height="200px"
        >
        </v-img>
        <v-card-title primary-title>
          <div>
            <div class="headline">Autor: Daniel Alejandro</div>
          </div>
        </v-card-title>

        <v-card-actions>
            <v-spacer></v-spacer>
          <font size="4" class="grey--text"><v-icon>flare</v-icon> 30`c</font> <v-spacer></v-spacer>
          <font size="4" class="grey--text"><v-icon>map</v-icon> Tuxtla Gutierrez</font>
          <v-spacer></v-spacer>
          <v-btn icon @click="show = !show">
            <v-icon>{{ show ? 'keyboard_arrow_down' : 'keyboard_arrow_up' }}</v-icon>
          </v-btn>
        </v-card-actions>

        <v-slide-y-transition>
          <v-card-text v-show="show">
            <font size="3">POST:Primera prueba hola como estas nskdnjksjdnfkjsdn</font>
            </v-card-text>
        </v-slide-y-transition>
      </v-card> 
      </v-flex>


      <v-flex xs12 md6 lg4 >
      <v-card>
        <v-img
          src="https://i.ytimg.com/vi/8sDZdgDlDWk/maxresdefault.jpg"
          height="200px"
        >
        </v-img>
        <v-card-title primary-title>
          <div>
            <div class="headline">Autor: Daniel Alejandro</div>
          </div>
        </v-card-title>

        <v-card-actions>
            <v-spacer></v-spacer>
          <font size="4" class="grey--text"><v-icon>flare</v-icon> 30`c</font> <v-spacer></v-spacer>
          <font size="4" class="grey--text"><v-icon>map</v-icon> Tuxtla Gutierrez</font>
          <v-spacer></v-spacer>
          <v-btn icon @click="show = !show">
            <v-icon>{{ show ? 'keyboard_arrow_down' : 'keyboard_arrow_up' }}</v-icon>
          </v-btn>
        </v-card-actions>

        <v-slide-y-transition>
          <v-card-text v-show="show">
            <font size="3">POST:Primera prueba hola como estas nskdnjksjdnfkjsdn</font>
            </v-card-text>
        </v-slide-y-transition>
      </v-card> 
      </v-flex>

      <v-flex xs12 md6 lg4 >
        <v-card height="200px">
        <v-btn style="margin-top:60px;" fab dark large color="primary" @click="dialogFoto=true"><v-icon>add_photo_alternate</v-icon></v-btn>
        </v-card>
      </v-flex>
      
    </v-layout>

<div class="text-xs-center">
    <v-dialog
      v-model="dialogFoto"
      width="500"
      height="500"
    >
      <v-card>
    <SubirFoto></SubirFoto>
    <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn
            color="primary"
            
            @click="dialogFoto = false"
          >
            Publicar
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
</div>

  </v-container>
  </div>
</template>
<script>
import SubirFoto from './FormularioFoto'
export default {
  components:{SubirFoto},
    data(){
        return{
            dialogFoto: '',
            show:false
        }
    },
    methods: {
     
    },
}
</script>