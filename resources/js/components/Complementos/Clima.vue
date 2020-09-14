<template>
  <v-container grid-list-lg text-lg-center>
    <v-layout row wrap>
      <v-flex xs12 md12 lg12>
        <v-card>
          <v-card-title>
            <v-btn @click="dialogBusqueda=true">Buscar lugar especifico</v-btn>
            <v-spacer></v-spacer>
            <v-text-field
              v-model="buscar"
              append-icon="search"
              label="Buscar"
              single-line
              hide-details
            ></v-text-field>
          </v-card-title>

          <v-data-table
            :headers="headers"
            :items="datos"
            :search="buscar"
            :loading="loadingTabla"
            :rows-per-page-items='[5,10,25,50,{"text":"TODOS LOS DATOS","value":-1}]'
            rows-per-page-text="PÁGINAS"
          >
            <template v-slot:items="props">
              <td class="text-xs-center">{{ props.item.name }}</td>
              <td class="text-xs-center">{{ props.item.main.temp }}</td>
              <td class="text-xs-center">{{ props.item.main.temp_max }}</td>
              <td class="text-xs-center">{{ props.item.main.temp_min }}</td>
              <td class="text-xs-center">{{ props.item.sys.country }}</td>
            </template>
            <template v-slot:no-results>
              <v-alert
                :value="true"
                color="error"
                icon="warning"
              >Lo sentimos, no se encontro "{{ buscar }}". :(</v-alert>
            </template>
          </v-data-table>
        </v-card>
      </v-flex>

      <div class="text-xs-center">
        <v-dialog v-model="dialogBusqueda" persistent width="500">
          <v-card>
            <v-card-title
              class="headline white--text"
              style="background-image: url('https://www.radioformula.com.mx/wp-content/uploads/2019/09/clima-hoy-martes-3-de-septiembre-2019-mexico-cdmx-edomex-pronostico-tiempo.jpg'); "
              primary-title
            >
              Busque el clima del pais que quieras
              <v-spacer></v-spacer>
              <v-btn flat icon color="white" @click="dialogBusqueda = false">
                <v-icon>clear</v-icon>
              </v-btn>
            </v-card-title>

            <v-card-text>
              <v-flex>
                <v-text-field label="Pais" v-model="pais"></v-text-field>
              </v-flex>
              <span>Nota: Escribe el pais en ingles para arrojar mejor los resultados</span>
            </v-card-text>

            <br />
            <v-layout justify-center>
              <font size="4" class="px-5">
                <v-icon>map</v-icon>
                {{nombrePais}}
              </font>

              <font size="4">
                <v-icon>flare</v-icon>
                {{tempPais}}
              </font>
            </v-layout>
            <br />
            <v-layout justify-center>
              <font size="4" class="px-5">
                <v-icon>my_location</v-icon>
                {{latPais}}
              </font>

              <font size="4">
                <v-icon>my_location</v-icon>
                {{lonPais}}
              </font>
            </v-layout>

            <v-divider></v-divider>

            <v-card-actions>
              <v-btn block color="secondary" dark @click="BusquedaPais(pais)">Buscar</v-btn>
            </v-card-actions>
          </v-card>
        </v-dialog>
      </div>

      <v-snackbar
        v-model="NotificacionSuccess"
        :multi-line="true"
        :right="true"
        :timeout="3000"
        :top="true"
        color="success"
      >
        <v-icon left color="white">check_circle</v-icon>
        <font size="3">{{textoSuccess}}</font>
        <v-btn flat @click="NotificacionSuccess = false">
          <v-icon color="white">cancel</v-icon>
        </v-btn>
      </v-snackbar>
      <v-snackbar
        v-model="NotificacionError"
        :multi-line="true"
        :right="true"
        :timeout="3000"
        :top="true"
        color="error"
      >
        <v-icon normal color="white" left>report_problem</v-icon>
        <font size="3">{{textError}}</font>
        <v-btn flat @click="NotificacionError = false">
          <v-icon color="white">cancel</v-icon>
        </v-btn>
      </v-snackbar>
    </v-layout>
  </v-container>
</template>

<script>
import Axios from "axios";
import prueba from "../prueba";
import { BusquedaApi } from "../../Services/Clima";

export default {
  components: { prueba },
  methods: {
    BusquedaPais(pais) {
      axios
        .post("http://127.0.0.1:8000/busqueda", {
          pais: pais,
        })
        .then((res) => {
          if (res.data.cod == 200) {
            this.nombrePais = res.data.name;
            this.tempPais = res.data.main.temp;
            this.latPais = res.data.coord.lat;
            this.lonPais = res.data.coord.lon;
            this.textoSuccess = "Se ha encontrado los datos";
            this.NotificacionSuccess = true;
          } else {
            this.textError = "No se ha encontrado los datos";
            this.NotificacionError = true;
          }
        })
        .catch((err) => {
          this.textError = "Error de conexion";
          this.NotificacionError = true;
        });
    },
  },
  mounted() {
    axios({
      method: "GET",
      url: "http://127.0.0.1:8000/climax",
    })
      .then((res) => {
        this.datos = res.data;
        this.loadingTabla = false;
      })
      .catch((err) => {});
  },
  data() {
    return {
      NotificacionSuccess: false,
      NotificacionError: false,
      textoSuccess: "",
      textError: "",

      nombrePais: "",
      tempPais: "",
      latPais: "",
      lonPais: "",

      buscar: "",
      datos: "",
      datosAPI: [{ name: "" }],
      pais: "",
      dialogBusqueda: false,
      loadingTabla: true,
      headers: [
        { text: "Ciudad", value: "name", align: "center", sortable: false },
        {
          text: "Temperatura actual",
          value: "main.temp",
          align: "center",
          sortable: false,
        },
        {
          text: "Temperatura max",
          value: "main.temp_min",
          align: "center",
          sortable: false,
        },
        {
          text: "Temperatura min",
          value: "main.temp_max",
          align: "center",
          sortable: false,
        },
        {
          text: "Pais",
          value: "sys.country ",
          align: "center",
          sortable: false,
        },
      ],
    };
  },
};
</script>