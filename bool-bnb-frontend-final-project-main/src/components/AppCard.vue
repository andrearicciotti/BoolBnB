<script>
export default {
    data() {
        return {

        }
    }
}
</script>
<template>
 <!-- <div class="container">
    <div v-for="index in 20" :key="index" class="card" style="width: 18rem;">
      <img src="../assets/img/pexels-pixabay-271624.jpg" class="" alt="...">
      <div class="card-body">
        <p class="card-text"><i class="fa-solid fa-location-dot"></i> Bari, Italy</p>
        <p><i class="fa-solid fa-street-view"></i> Via roma 41</p>
        <p><strong><i class="fa-solid fa-dollar-sign"></i> 335$</strong></p>
      </div>
    </div>
  </div> -->
</template>
<style lang="scss" scoped>
.container {
width: 100%;  
padding-top: 30px;
display: flex;
justify-content: center;
flex-wrap: wrap;
gap: 1rem;
border-radius: 20px;
background-color: #F9FAFB;

    .card {
        border: none;
        vertical-align: baseline;
        line-height: .8rem;
        border: none;
        background:none;
        
        img {
            border-radius: 20px;
        }
    }
}

</style>