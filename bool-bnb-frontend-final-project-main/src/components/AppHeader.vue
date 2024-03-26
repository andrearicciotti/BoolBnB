<script>
import { store } from "../store";

export default {
  data() {
    return {
      store,
      links: [
        {
          name: "home",
          title: "Home",
          icon: "fa-house"
        },
        {
          name: "search",
          title: "Search",
          icon: "fa-magnifying-glass"
        },
      ],
    };
  },
};
</script>

<template>
  <nav class="navbar navbar-expand-lg border-bottom border danger p-3" :class="store.headerTransparent === true ? 'ms_header-transparent' : ''">
    <div class="container-fluid">
      <a class="logo" href="#"><img src="../assets/img/b.png" alt="" /></a>

      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="ms-auto navbar-nav">
          <li class="nav-item" v-for="link in links" :key="link.title">
            <router-link :to="{ name: link.name }" class="nav-link"><i class="fa-solid nav-item me-1" :class="link.icon"></i> {{
              link.title
            }}</router-link>
          </li>
          <li class="nav-item">
            <a href="http://127.0.0.1:8000/" class="nav-link"><i class="fa-solid fa-user me-1"></i> Profile</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>

<style lang="scss" scoped>
@use "../style/partials/variables" as *;


.navbar {
  background-color: #f2f4f7;
  position: fixed;
  left: 0;
  top: 0;
  z-index: 999;
  width: 100%;
}

.logo {
  img {
    max-height: 40px;
    border-radius: 10px;
  }
}

.navbar {
  display: flex;
  justify-content: center;
  a {
    margin-left: 5px;
  }

  a:hover {
    color: $light-blue;
    border-radius: 10px;
    background: none;
  }
}

h1 {
  font-family: "Montserrat", sans-serif;
  font-size: 3rem;
  color: white;
}

.ms_header-transparent {
  background-color: transparent;
  color: #f1f4f7 !important;
  border: none !important;

  a {
    color: inherit !important;
  }
}

</style>
