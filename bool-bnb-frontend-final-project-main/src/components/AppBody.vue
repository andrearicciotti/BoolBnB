<script>
import axios from 'axios';
import { store } from '../store'
export default {
    data() {
        return {
            store,
            apartments: [],
        };
    },

    created() {
        this.fetchData()

    },
    methods: {
        fetchData() {
            axios.get(`${this.store.baseUrl}/api/apartments`).then((resp) => {
                console.log(resp.data.result.data)
                this.apartments = resp.data.result.data;
            })
        },
        getImage(imgPath) {
            return new URL(`../assets/img/${imgPath}`, import.meta.url).href;
        }
    }
}
</script>
<template>
    <div class="container my-5">

        <h2 class="text-center my-5">Evidenza</h2>
        <div  class="row flex-wrap justify-content-center align-items-center g-5">
            <div v-for="apartment in apartments" :key="apartment.id" class="col-12 col-md-5 col-lg-3">
            <div>
                <div class="card">
                         <img v-if="apartment.images.length === 0" :src="getImage('no_Image_Available.jpg')"
                            :alt="apartment.title">
                        <div v-else class="" >
                            <div class="">
                                <img :src="`${store.baseUrl}/storage/image_path/${apartment.images[0].image_path}`"
                                    class="" :alt="apartment.title">
                            </div>
                        </div>
                        <div class="card-body">
                            <h5>{{ apartment.title }}</h5>
                            <p>{{ apartment.city }}</p>
                            <p>Number of room: {{ apartment.apartment_info.num_rooms }}</p>
                            <p>Number of beds: {{ apartment.apartment_info.num_beds }}</p>
                        </div>
                </div></div>

            </div>
        </div>
    </div>
</template>
<style lang="scss" scoped>
img {
    width: 100%;
}
</style>
