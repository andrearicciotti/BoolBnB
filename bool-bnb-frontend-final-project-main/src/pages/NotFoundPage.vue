<script>
import { store } from "../store";

export default {
    data() {
        return {
            store,
        }
    },

    created() {
        this.store.headerTransparent = true;
    }
}
</script>

<template>
    <div class="w-100">
        <div class="ms_video-container">
            <video autoplay loop muted src="../assets/video/gobackhome.mp4" class="w-100 ms_404-video"></video>
            <h2 class="fs-2">You're way off track</h2>
            <p class="fs-5">-ERROR 404-</p>
            <router-link :to="{ name: 'home' }" class="ms_link nav-link fs-3 me-2">Go back <i class="fa-solid fa-house ms-1">Home</i>
            </router-link>

        </div>
    </div>
</template>

<style lang="scss" scoped>


.ms_video-container {
    position: relative;
    display: flex;
    justify-content: center;

    .ms_404-video {
        filter: brightness(0.60);
    }

    h2 {
        position: absolute;
        bottom: 105px;
        color: #f2f4f7;
        filter: drop-shadow(10px 10px 10px black);
        // font-size: 2rem;
    }

    p {
        position: absolute;
        bottom: 65px;
        color: #f2f4f7;
        filter: drop-shadow(10px 10px 10px black);
    }

    .ms_link {
        position: absolute;
        bottom: 35px;
        color: #f2f4f7;
        filter: drop-shadow(10px 10px 10px black);
    }

}
</style>