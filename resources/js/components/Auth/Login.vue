<template  v-on:keyup.enter="submit" v-v-if="dialog == false"  data-app="true">
  <div>
    <v-parallax
      dark
      height="780"
      src="https://diariodeavisos.elespanol.com/wp-content/uploads/2017/11/Lagoa-das-Sete-Cidades.jpg"
    >
      <v-layout align-center column justify-center>
        <h1 class="font-weight-thin" style="font-size:12vw;">Climax</h1>
        <h2 class="py-4">Conoce el clima perfecto para tus fotografias</h2>
        <div class="text-xs-center">
          <v-card class="elevation-12 tamano">
            <v-card-title class="headline cyan white--text" primary-title>Inicia sesion</v-card-title>
            <v-card-text>
              <v-form ref="form" v-model="valid" lazy-validation class="white--text">
                <v-text-field
                  v-model="form.email"
                  :rules="emailRules"
                  label="Correo electronico"
                  required
                ></v-text-field>
                <v-text-field
                  v-model="form.password"
                  :rules="passRules"
                  :append-icon="show ? 'visibility' : 'visibility_off'"
                  :type="show ? 'text' : 'password'"
                  @click:append="show = !show"
                  label="Contraseña"
                  required
                  v-on:keyup.13="submit"
                ></v-text-field>
                <!-- <v-checkbox v-model="checkbox" label="Mantener sesión iniciada"></v-checkbox> -->
              </v-form>
            </v-card-text>
            <v-card-actions>
              <v-btn color="cyan" dark :large="true" :loading="loading" :disabled="activo" block @click="submit">ENTRAR</v-btn>
              <br />
            </v-card-actions>
            <h5 class="py-3">
              Aun no tienes una cuenta?
              <v-btn flat @click="dialogRegistro=true">Registrate</v-btn>
            </h5>
          </v-card>
        </div>
      </v-layout>
    </v-parallax>

    <v-footer height="auto" color="black">
      <v-layout justify-center row wrap>
        <v-flex black py-3 text-xs-center white--text xs12>
          <font size="3">Esta aplicacion web fue desarrollada con las siguientes tecnologias</font>
        </v-flex>

        <img
          class="px-2"
          style="width:58px; height:48px;"
          src="https://soyescandon.herokuapp.com/img/larav.92952c3e.svg"
        />
        <img
          class="px-2"
          style="width:58px; height:48px;"
          src="https://soyescandon.herokuapp.com/img/vuejs2.859d932a.svg"
        />
        <img
          class="px-2"
          style="width:58px; height:48px;"
          src="https://soyescandon.herokuapp.com/img/html5.6b2c5b57.svg"
        />
        <img
          class="px-2"
          style="width:58px; height:48px;"
          src="https://soyescandon.herokuapp.com/img/css3.553c416c.svg"
        />

        <v-flex black py-3 text-xs-center white--text xs12>
          &copy;2020 —
          <strong>Daniel Alejandro</strong>
        </v-flex>
      </v-layout>
    </v-footer>

    <v-dialog
      v-model="dialogRegistro"
      fullscreen
      hide-overlay
      transition="dialog-bottom-transition"
    >
    <v-card>
        <v-toolbar
          dark
          style="background-image:url(http://wallpoper.com/images/00/36/45/90/horizon_00364590.jpg)"
        >
          <v-btn icon dark @click="dialogRegistro = false">
            <v-icon>close</v-icon>
          </v-btn>
          <v-toolbar-title>Registrar</v-toolbar-title>
          <v-spacer></v-spacer>
          <v-toolbar-items>
            <v-btn dark flat @click="dialog = false">Guardar</v-btn>
          </v-toolbar-items>
        </v-toolbar>
        <v-card-text>
          <v-container grid-list-md>
      <registro></registro>
          </v-container>
        </v-card-text>
    </v-card>
    
    </v-dialog>
  </div>
</template>
<script>

import { login } from "../../Services/authenticate";
import registro from "./Registro";
export default {
  components: { registro },
  mounted() {},
  data: () => ({
    dialogRegistro: false,
    loading: false,
    form: {
      email: "",
      password: "",
    },
    activo:false,
    dataError: "",
    error: false,
    valid: true,
    
    passRules: [
        v => v.length >= 8 || 'La contrasena tiene que ser mas de 8 caracteres'
      ],
    emailRules: [
      (v) => !!v || "Correo electronico requerido",
      (v) => /.+@.+/.test(v) || "Necesita ser un correo valido",
      (v) =>
        /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(v) ||
        "Necesita ser un correo valido",
    ],
    show: false,
  }),

  methods: {
    submit(e) {
      this.loading = true;

      login(this.$data.form)
        .then((res) => {
          this.loading = false;
          this.$refs.form.reset();
          document.location.reload(true);
          // this.$store.commit("remember", this.checkbox);
          //this.$store.commit("loginSuccess", res.data);
          //this.$router.push({ path: "/menu" });
        })
        .catch((error) => {
          /* this.loading = false
            this.$store.commit("loginFailed", { error });
            
            this.dataError = "Contraseña o email erroneo";
            this.error = true;*/
        });
    },
    clear() {
      // this.$refs.form.reset();
    },
  },
};
</script>
