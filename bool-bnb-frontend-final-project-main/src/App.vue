<script>
import AppHeader from "./components/AppHeader.vue";
import AppFooter from "./components/AppFooter.vue";
import axios from "axios";
import { store } from "../src/store";

export default {
  data() {
    return {
      store,
    };
  },

  created() {
    // this.fetchData();
  },
  components: {
    AppHeader, AppFooter
  },

  methods: {
    fetchData() {
      axios.get(`${this.store.baseUrl}/api/apartments`).then((resp) => {
        console.log(resp.data);
      });
    },
  },
};
</script>

<template>
  <AppHeader />

  <router-view></router-view>
  <AppFooter />
</template>

<style lang="scss">
@use "./style/general.scss" as *;
@import "@fortawesome/fontawesome-free/css/all.css";


</style>
