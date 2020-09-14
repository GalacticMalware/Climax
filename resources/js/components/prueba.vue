<template>
  <div>
    <v-btn color="black" @click="pruebasClima">Hola mundo</v-btn>
  </div>
</template>
<script>

import Axios from "axios";
export default {
  data() {
    return {
      datos: null,
    };
  },
  methods: {
    pruebasClima() {
      axios.get('api/user').then( function(response) { console.log(response.data); });
     /* axios({
        method: "GET",
        url: "https://api.openweathermap.org/data/2.5/weather?id=3515001&appid=216faa55bed867d6bb552ab98ba80869",
      })
        .then((res) => {
          console.log(res.data);
        })
        .catch((err) => {
          console.log(err);
        });*/
    },
  },
};
</script>