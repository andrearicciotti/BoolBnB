<script>
import axios from "axios";
import { store } from "../store";
import AppModal from "../components/AppModal.vue";

export default {
  data() {
    return {
      store,
      apartments: [],
      slug: "",
      currentPage: 1,
      totalPages: 1,
      location: '',
    };
  },

  created() {
    this.store.headerTransparent = true;
    this.fetchData();
    this.handleScroll();
  },

  components: {
    AppModal,
  },

  methods: {
    fetchData() {
      axios.get(`${this.store.baseUrl}/api/apartments?page=${this.currentPage}`).then((resp) => {
        console.log(resp);
        this.apartments = resp.data.result.data;
        this.totalPages = resp.data.result.last_page;
      });
    },

    handleScroll() {
      document.addEventListener('scroll', (e) => {
        let myVideoHeight = document.getElementById('myVideo').offsetHeight;
        console.log(window.scrollY, this.store.headerTransparent, myVideoHeight);
        if (window.scrollY > myVideoHeight) {
          this.store.headerTransparent = false;
        } else {
          this.store.headerTransparent = true;
        }
      })
    },

    truncateString(stringa, lunghezzaMassima) {
      if (stringa.length <= lunghezzaMassima) {
        return stringa;
      } else {
        return stringa.substring(0, lunghezzaMassima) + "...";
      }
    },

    message(slug) {
      this.slug = slug;
    },

    changePage(page) {
      this.currentPage = page;
      this.fetchData();
      window.scrollTo({
        top: 400,
        behavior: "smooth",
        duration: 1000
      });
    },

    startSearch() {
      this.$router.push({ path: '/search', query: { location: this.location } });
      window.scrollTo(0, 600);
    },

    getIconClassForService(serviceId) {
      switch (serviceId) {
        case 1:
          return 'fa-solid fa-wifi';
        case 2:
          return 'fa-solid fa-square-parking';
        case 3:
          return 'fa-solid fa-person-swimming';
        case 4:
          return 'fa-solid fa-bell-concierge';
        case 5:
          return 'fa-solid fa-spa';
        case 6:
          return 'fa-solid fa-water';
        default:
          return '';
      }
    },
  },
};
</script>

<template>

  <!-- video -->
  <div class="w-100">
    <div class="ms_video-container">
      <video autoplay loop muted id="myVideo" src="../assets/video/homepage.mp4" class="w-100 ms_404-video"></video>
      <h2 class="fs-1">BoolBnB</h2>
      <p class="ms_caption fs-3">Your Home Away From Home</p>
      <a href="#card"><i class="fa-solid fa-chevron-down"></i></a>
    </div>
  </div>

  <div class="ms_margin w-100" id="card"></div>
  <!-- apartment--card -->
  <div class="container">
    <div class="row justify-content-center my-5">
      <div class="col-12 col-md-6 col-lg-4 col-xl-4 col-xxl-3 px-3" v-for="apartment in apartments"
        :key="apartment.id">
        <router-link class="ms_card" :to="{ name: 'apartmentInfo', params: { slug: apartment.slug } }" target="_blank">
          <div class="position-relative">
            <i class="fa-regular fa-gem ms_icon-sponsored"></i>
            <img :src="`${store.baseUrl}/storage/image_path/${apartment.image_path}`" alt=""
              class="card-img-top mb-2" />
            <div class="card-body">
              <h5 class="card-title mt-2 fs-6">
                {{ truncateString(apartment.title, 25) }}
              </h5>
              <p class="m-0 p-0 mt-2">
                {{ apartment.street_name }} {{ apartment.street_number }}
              </p>
              <p class="mb-3 p-0">{{ apartment.city }}</p>
            </div>

            <div class="d-inline p-1 ms_services" v-for="service in apartment.services" :key="service.id">
              <i :class="getIconClassForService(service.name)"></i>
            </div>

          </div>
        </router-link>
      </div>
    </div>
  </div>

  <nav aria-label="Page navigation" class="my-4 container">

    <div class="text-center d-flex justify-content-center">
      <ul class="pagination d-flex">
        <li class="page-item" :class="{ 'disabled': currentPage === 1 }">
          <a class="page-link flex-grow-1" href="#" aria-label="Previous" @click.prevent="changePage(currentPage - 1)">
            <span aria-hidden="true">&laquo;</span>
          </a>
        </li>
        <li class="page-item" v-for="page in totalPages" :key="page" :class="{ 'active': currentPage === page }">
          <a class="page-link" href="#" @click="changePage(page)">{{ page }}</a>
        </li>
        <li class="page-item" :class="{ 'disabled': currentPage === totalPages }">
          <a class="page-link flex-grow-1" href="#" aria-label="Next" @click.prevent="changePage(currentPage + 1)">
            <span aria-hidden="true">&raquo;</span>
          </a>
        </li>
      </ul>
    </div>

  </nav>

  <div class="row justify-content-center">
    <div class="col-4 box-search">
      <div class="d-flex justify-content-center">
        <input class="ms_searchbox" type="text" placeholder="Find your destination" v-model="location">
        <button class="my-btn-search" @click="startSearch" :disabled="location == ''">Search</button>
      </div>
    </div>
  </div>


  <AppModal :slug="slug" />
</template>

<style lang="scss" scoped>
@use "../style/general.scss" as *;
@use "../style/partials/variables" as *;
@import "@fortawesome/fontawesome-free/css/all.css";


.ms_video-container {
  position: relative;
  display: flex;
  justify-content: center;
  color: #f2f4f7;

  .ms_404-video {
    filter: brightness(0.60);
  }

  h2 {
    position: absolute;
    bottom: 125px;
    color: #f2f4f7;
    filter: drop-shadow(10px 10px 10px black);
    // font-size: 2rem;
  }

  .ms_caption {
    position: absolute;
    bottom: 45px;
    color: #f2f4f7;
    filter: drop-shadow(10px 10px 10px black);
  }

  a {
    color: inherit;
    text-decoration: none;
    position: absolute;
    bottom: 25px;
    color: #f2f4f7;
    filter: drop-shadow(10px 10px 10px black);
    animation: arrow 2s linear infinite;
  }

}

@keyframes arrow {
  0% {
        bottom: 25px;
    }

    25% {
        bottom: 22px;
    }

    50% {
      bottom: 18px;
    }

    75% {
        bottom: 22px;
    }

    100% {
        bottom: 25px;
    }
}

.ms_margin {
  margin-top: 4rem;
  height: 10px;
}
</style>
