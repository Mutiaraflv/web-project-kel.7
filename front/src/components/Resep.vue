<template>
<div>
  <!-- Blog Awal -->
  <div class="container">
      <div class="header">
        <div class="hero">
          <h2 class="heading">Sate Ayam</h2>
          <p class="sub-heading">Makanan khas Madura</p>
        </div>
        <div class="features feature-1">
          <h3 class="item">Ice Mangga</h3>
          <p class="ket">Kesegaran Buah</p>
        </div>
        <div class="features feature-2">
          <h3 class="item">Nanas</h3>
          <p class="ket">Buah Nanas khas Subang</p>
        </div>
      </div>
    </div>
    <!-- Blog Akhir -->

    <section id="aneka" class="aneka mt-5">
        <div class="container">
          <div class="row text-start mb-3">
            <div class="col">
              <h2 style="color: #fff;">Aneka Resep Khas Bandung</h2>
            </div>
          </div>
          <div class="row justify-content-center text-center mb-3 my-3">
            <div class="col-lg-3 col-md-6 mt-4" v-for="resep in reseps" :key="resep.id_resep">
              <div class="card  mb-3" style="background-color: #FFEAB1; border-color: #FFEAB1; border-style: double;"></div>
              <div class="card" style="background-color: #f8eac4;">
                <img :src="resep.gambar_resep" class="card-img-top" alt="error image" />
                <div class="card-body">
                  <h5 class="card-title">
                    {{ resep.judul_resep }}
                  </h5><br>
                  <p class="card-text" style="text-align: justify; font-size: medium;">
                    {{ resep.penjelasan }}
                  </p>
                  <router-link class="btn btn-outline-dark" style="font-size: medium;" :to="'/resep/'+resep.id_resep">Yuk Coba</router-link>
                </div>
              </div>
            </div>
          </div>
        </div>
        <router-link class="btn btn-primary btn-lg rounded-circle" style="position: fixed; bottom: 30px; right: 30px; z-index: 1000;        background-color: #ffeab1; border-color: #ffeab1; border: 2px solid #877f7d;" :to="{ name: 'ResepTambah' }">
          <svg xmlns="http://www.w3.org/2000/svg" width="25" height="40" fill="#877f7d" class="bi bi-plus" viewBox="0 0 16 16">
          <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
          </svg>
        </router-link>
    </section>
</div>
</template>

<script>
import axios from "axios";

export default {
  name: "Resep",
  data() {
    return {
      reseps: [],
    };
  },
  mounted() {
    this.getReseps();
  },
  methods: {
    async getReseps() {
      try {
        const response = await axios.get('resep');
        this.reseps = response.data;
      } catch (error) {
        console.error("Terjadi kesalahan saat mengambil data:", error.message);
      }
    },
  },
};
</script>

<style>
/* Blog */
.header {
  display: grid;
  grid-template-areas:
    "hero hero feature-1"
    "hero hero feature-2";
}

.hero {
  grid-area: hero;
  min-height: 300px;
  background-image: url(../assets/img/sate.jpg);
  background-size: cover;
  background-position: center;
  padding: 50px;
}

.hero > * {
  display: none;
}

.features {
  background-color: #000;
  color: #fff;
  display: grid;
  place-content: center;
  text-align: center;
  cursor: pointer;
}

.feature-1 {
  grid-area: feature-1;
  background-image: url(../assets/img/eskrimmangga.png);
  background-size: cover;
}

.feature-2 {
  grid-area: feature-2;
  background-image: url(../assets/img/nanas.png);
  background-size: cover;
}

.features .item {
  font-size: 2em;
  font-weight: 200;
}

.kotak {
  background: #fcfcfc;
  padding: 20px;
  width: 200px;
  float: left;
  margin: 20px;
  height: 200px;
}

.kotak8 {
  border-radius: 10px 10px 50% 50%;
}
</style>
