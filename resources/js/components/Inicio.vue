<template>
  <div>
    <v-container grid-list-lg text-lg-center>
    <v-layout row wrap>

      <v-flex xs12 md12 lg12>
        <v-layout>
    <v-flex >
      <v-card>
        <v-img
          src="https://cdn.vuetifyjs.com/images/cards/desert.jpg"
          aspect-ratio="2.75"
        ></v-img>

        <v-card-title primary-title>
          <div>
            <h3 class="headline mb-0">{{datos[0].name}}</h3>
          </div>
        </v-card-title>

        <v-card-actions>
          <v-spacer></v-spacer>
          <font><v-icon>brightness_low</v-icon>{{datos[0].main.temp}} Temperatura</font><v-spacer></v-spacer>
          <font><v-icon>brightness_low</v-icon>{{datos[0].main.temp_min}} Temperatura minima</font><v-spacer></v-spacer>
          <font><v-icon>brightness_low</v-icon>{{datos[0].main.temp_max}} Temperatura maxima</font><v-spacer></v-spacer>
        </v-card-actions>
      </v-card>
    </v-flex>
  </v-layout>
      </v-flex>

      <v-flex xs12 md12 lg12>
        <v-layout>
    <v-flex >
      <v-card>
        <v-img
          src="https://cdn.vuetifyjs.com/images/cards/desert.jpg"
          aspect-ratio="2.75"
        ></v-img>

        <v-card-title primary-title>
          <div>
            <h3 class="headline mb-0">{{datos}}</h3>
          </div>
        </v-card-title>

        <v-card-actions>
          Prueba data
        </v-card-actions>
      </v-card>
    </v-flex>
  </v-layout>
      </v-flex>
    </v-layout>
    </v-container>
  </div>
</template>

<script>

export default {
  components: {},
    data(){
      return{
        datos:[{name:'',
        main:{temp:'',temp_max:'',temp_min:''}
        }],
      }
    },
    mounted() {
       axios({
      method: "GET",
      url: "http://127.0.0.1:8000/datosInicio",
    })
      .then((res) => {
        
        this.datos[0].name = res.data.name
        this.datos[0].main.temp = res.data.main.temp
        this.datos[0].main.temp_min = res.data.main.temp_min
        this.datos[0].main.temp_max = res.data.main.temp_max
      })
      .catch((err) => {
        console.log(err)
      });
    },
};
</script>