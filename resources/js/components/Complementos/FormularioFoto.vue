<template >
  <div class="text-xs-center">
        <v-card-title
          class="headline white--text"
          primary-title
          style="background-image:url(https://cdn.forbes.com.mx/2018/02/Naturaleza-Portada.jpg)"
        >
          Nueva publicacion
        </v-card-title>
        <div class="py-3"></div>

       
       <form @submit.prevent="envioImagen" enctype="multipart/form-data">
            <input @change="imagen($event)" type="file" accept="image/*">
            <input type="submit" value="Subir imagen">
            
       </form>
          
    <!--    <v-hover type="file">
    <v-card
      slot-scope="{ hover }"
      :class="`elevation-${hover ? 12 : 2}`"
      class="mx-auto"
      width="344"
      height="344"
    >
    </v-card>
    <v-img
        :aspect-ratio="16/9"
        :src="imagenFile"
      ></v-img>
  </v-hover>-->
        
        <v-card-text>
            <v-text-field label="Ingrese el nombre del pais" name="pais"></v-text-field>
            <v-textarea label="Comentario" name="pais"></v-textarea>
         </v-card-text>
        <v-divider></v-divider> 

      
  </div>
</template>

<script>
import {imagenUp} from '../../Services/Clima'
export default {
  data(){
      return{
          imagenFile:[],
        reviews: 413,
        value: 4.5
      }
  },
  methods:{
      imagen(e){
          this.imagenFile = e.target.files[0]
      },
      envioImagen(){
          imagenUp(this.imagenFile).then(res=>{
              console.log(res.data)
          }).catch(err=>{

          })
      }
  }
}
</script>