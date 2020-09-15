<template v-on:keyup.enter="submit"  data-app="true">
  <div class="text-xs-center">
    <v-form class="white--text">
      <v-flex>
        <v-text-field label="Nombre completo" required v-model="form.name"></v-text-field>
      </v-flex>
      <v-flex>
        <v-text-field label="Correo electronico" required v-model="form.email"></v-text-field>
      </v-flex>
      <v-flex>
        <v-text-field
          label="Contraseña"
          :append-icon="show ? 'visibility' : 'visibility_off'"
          :type="show ? 'text' : 'password'"
          @click:append="show = !show"
          v-model="form.password"
          required
           :rules="passRules"
          v-on:keyup.13="submit"
        ></v-text-field>
      </v-flex>
      <v-flex>
        <v-text-field
         :rules="passRules"
          label="Repetir contraseña"
          :append-icon="show ? 'visibility' : 'visibility_off'"
          :type="show ? 'text' : 'password'"
          @click:append="show = !show"
          v-model="form.password_confirmation"
          required
          v-on:keyup.13="submit"
        ></v-text-field>
      </v-flex>
      <v-flex>
        <v-btn color="cyan" dark :large="true" :loading="loading" block @click="submit">ENTRAR</v-btn>
      </v-flex>
    </v-form>

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
  </div>
</template>
<script>
import { registro } from "../../Services/authenticate";
export default {
  data() {
    return {
      dialog: false,
      loading: false,
      form: {
        name: "",
        email: "",
        password: "",
        password_confirmation: "",
      },
      dataError: "",
      timeout: 4000,
      error: false,
      valid: true,

      NotificacionSuccess: false,
      NotificacionError: false,
      textoSuccess: "",
      textError: "",

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
      select: null,
      items: ["Item 1", "Item 2", "Item 3", "Item 4"],
      checkbox: false,
      show: false,
    };
  },
  methods: {
    submit(e) {
      this.loading = true;
      if (this.form.password == this.form.password_confirmation) {
        registro(this.$data.form)
          .then((res) => {
            this.loading = false;
            this.textoSuccess = "Felicidades haz creado tu cuenta";
            this.NotificacionSuccess = true;
            document.location.reload(true);
          })
          .catch((error) => {
            this.textError = "El correo ya existe";
            this.NotificacionError = true;
            this.loading = false;
          });
      } else {
        this.textError = "La contraseña no coinciden";
        this.NotificacionError = true;
        this.loading = false;
      }
    },
  },
  /*watch: {
    "form.password_confirmation"(val) {
      if (val == this.form.password) {
        console.log(val);
      }
    },
  },*/
};
</script>