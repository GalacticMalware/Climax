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
            <h3 class="headline mb-0">{{datos.name}}</h3>
          </div>
        </v-card-title>

        <v-card-actions>
          <v-spacer></v-spacer>
          <font><v-icon>brightness_low</v-icon>{{datos.main.temp}} Temperatura</font><v-spacer></v-spacer>
          <font><v-icon>brightness_low</v-icon>{{datos.main.temp_min}} Temperatura minima</font><v-spacer></v-spacer>
          <font><v-icon>brightness_low</v-icon>{{datos.main.temp_max}} Temperatura maxima</font><v-spacer></v-spacer>
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
            <h3 class="headline mb-0">{{datos.name}}</h3>
          </div>
        </v-card-title>

        <v-card-actions>
          <v-btn flat color="orange">Share</v-btn>
          <v-btn flat color="orange">Explore</v-btn>
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
        datos:''
      }
    },
    mounted() {
       axios({
      method: "GET",
      url: "http://127.0.0.1:8000/datosInicio",
    })
      .then((res) => {
        console.log(res.data.main.temp)
        this.datos = res.data;
      })
      .catch((err) => {
        console.log(err)
      });
    },
};
</script>