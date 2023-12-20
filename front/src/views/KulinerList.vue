<template>
    <div>
        <Navbar />

        <!-- Rekomendasi Tempat Jajan -->
        <section class="tempat" id="tempat">
        <div class="container">
            <div class="header">
                <div class="awal">
                    <h2 class="heading">Sate Ayam</h2>
                    <p class="sub-heading">Makanan khas Madura</p>
                </div>
                <div class="covers cover-1">
                    <h3 class="item">Dimsum</h3>
                    <p class="ket">Dimsum lezat khas Bandung</p>
                </div>
                <div class="covers cover-2">
                    <h3 class="item">Sabana</h3>
                    <p class="ket">Makanan cepat saji praktis</p>
                </div>
            </div>

            <div class="row text-start mb-3 mt-5">
                <div class="col">
                <h2 style="color: #fff;">Rekomendasi Tempat Jajan Favorit di Kota Bandung</h2>
                </div>
            </div>

            <div class="row justify-content-center md-3">
            <div class="col-lg-3 col-md-6 mt-3" v-for="kuliner in kuliners" :key="kuliner.id_kuliner">
                <div class="card  mb-3" style="background-color: #FFEAB1; border-color: #FFEAB1; border-style: double;">
                <img :src="kuliner.gambar_kuliner" class="card-img-top" alt="error image" />
                <div class="card-body">
                    <h5 class="card-title">{{ kuliner.nama_kuliner }}</h5>
                    <p class="card-text"> {{ kuliner.penjelasan_singkat }}</p>
                    <p style="font-size: 12px;">Lokasi: {{ kuliner.lokasi }} </p>
                    <p style="font-size: 12px;"> Jam buka: {{ kuliner.jam_buka }} </p>
                    <p style="font-size: 12px;">  Estimasi makan : {{ kuliner.estimasi_makan }}</p>
                    <router-link class="btn" style="background-color: #877f7d; color: #fff; font-size: small;" :to="'/kuliner/'+kuliner.id_kuliner">Selengkapnya</router-link>
                </div>
                </div>
            </div>
            </div>
        </div>
        </section>
        <!-- Akhir Rekomendasi Tempat Jajan -->

        <router-link class="btn btn-primary btn-lg rounded-circle" style="position: fixed; bottom: 30px; right: 30px; z-index: 1000; background-color: #ffeab1; border-color: #ffeab1; border: 2px solid #877f7d;" :to="{ name: 'KulinerTambah' }">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="40" fill="#877f7d" class="bi bi-plus" viewBox="0 0 16 16">
            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
            </svg>
        </router-link>

        <Footer />
    </div>
</template>

<script>
import Navbar from "@/components/Navbar.vue"
import Footer from "@/components/Footer.vue"
import axios from "axios";

export default {
  name: "KulinerList",
  components: {
        Navbar,
        Footer
    },
  data() {
    return {
      kuliners: [],
    };
  },
  mounted() {
    this.getKuliners();
  },
  methods: {
    async getKuliners() {
      try {
        const response = await axios.get('kuliner');
        this.kuliners = response.data;
      } catch (error) {
        console.error("Terjadi kesalahan saat mengambil data:", error.message);
      }
    },
  },
};
</script>

<style>
/* Tempat Rekomendasi */
.tempat {
  color: #fff;
}

.coba {
  background-color: transparent;
}

footer {
  padding: 5px;
  background-color: #ffeab1;
  text-align: center;
}

/* Blog */
.header {
  display: grid;
  grid-template-areas:
    "hero hero feature-1"
    "hero hero feature-2";
}

.awal {
  grid-area: hero;
  min-height: 300px;
  background-image: url(../assets/img/cafe.jpg);
  background-size: cover;
  background-position: center;
  padding: 50px;
}

.awal > * {
  display: none;
}

.covers {
  background-color: #000;
  color: #fff;
  display: grid;
  place-content: center;
  text-align: center;
  cursor: pointer;
}

.cover-1 {
  grid-area: feature-1;
  background-image: url(../assets/img/dimsum.jpg);
  background-size: cover;
}

.cover-2 {
  grid-area: feature-2;
  background-image: url(../assets/img/fastfood.jpg);
  background-size: cover;
}

.covers .item {
  font-size: 2em;
  font-weight: 200;
}
</style>