<template>
  <div>
      <Navbar />

      <!-- Slider -->
      <div
        id="carouselExampleIndicators"
        class="carousel slide"
        data-bs-ride="carousel"
      >
      <div class="carousel-indicators">
        <button
          type="button"
          data-bs-target="#carouselExampleIndicators"
          data-bs-slide-to="0"
          class="active"
          aria-current="true"
          aria-label="Slide 1"
        ></button>
        <button
          type="button"
          data-bs-target="#carouselExampleIndicators"
          data-bs-slide-to="1"
          aria-label="Slide 2"
        ></button>
        <button
          type="button"
          data-bs-target="#carouselExampleIndicators"
          data-bs-slide-to="2"
          aria-label="Slide 3"
        ></button>
        <button
          type="button"
          data-bs-target="#carouselExampleIndicators"
          data-bs-slide-to="3"
          aria-label="Slide 4"
        ></button>
        <button
          type="button"
          data-bs-target="#carouselExampleIndicators"
          data-bs-slide-to="4"
          aria-label="Slide 5"
        ></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="../assets/img/slide1.jpg" class="d-block w-100" alt="Welcome" />
        </div>
        <div class="carousel-item">
          <img src="../assets/img/slide2.jpg" class="d-block w-100" alt="Mie Sate" />
        </div>
        <div class="carousel-item">
          <img src="../assets/img/slide3.jpg" class="d-block w-100" alt="Nasi Uduk" />
        </div>
        <div class="carousel-item">
          <img src="../assets/img/slide4.jpg" class="d-block w-100" alt="Pedagang Sate" />
        </div>
        <div class="carousel-item">
          <img src="../assets/img/slide5.jpg" class="d-block w-100" alt="Coffie" />
        </div>
      </div>
        <button
          class="carousel-control-prev"
          type="button"
          data-bs-target="#carouselExampleIndicators"
          data-bs-slide="prev"
        >
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button
          class="carousel-control-next"
          type="button"
          data-bs-target="#carouselExampleIndicators"
          data-bs-slide="next"
        >
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
      <!-- Akhir Slider -->

      <!-- Tentang -->
      <section id="jajankuy" class="jajankuy">
        <div class="container-fluid py-5">
          <div class="container">
            <div class="row mb-3">
              <div class="col-12 text-start">
                <h2>Tentang KulinerBandung</h2>
              </div>
            </div>
            <div class="row justify-content-end">
              <div class="col-lg-5 col-md-3 col-12 order-2 mt-4">
                <p style="font-size: large;">
                  KulinerBandung adalah website tentang seputar kuliner yang ada di
                  Kota Bandung. Kuliner Bandung merupakan salah satu masakan terlezat 
                  di indonesia dengan bumbu rempah-rempah yang begitu lengkap. Ragam 
                  kuliner Bandung pun begitu banyak dan rata-rata membuatmu menelan 
                  ludah hanya dengan melihat gambar masakannya saja.
                </p><br>
                <a 
                  href="/"
                  class="btn" 
                  style="background-color: #877f7d; color: #fff;"> 
                  Lihat Selengkapnya
                </a>
              </div>
              <div class="col-lg-7 col-md-3 col-12 mt-3">
                <img
                  src="../assets/img/cafe.jpg"
                  class="img-fluid"
                  alt="error image"
                />
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Akhir Tentang -->


      <!-- Resep Populer  -->
      <section class="resep" id="resep">
        <div class="container">
          <div class="row text-center mb-3">
            <div class="col">
              <h1>Resep Populer</h1>
              <p class="text">Yuk Coba Masak!</p>
            </div>
          </div>
          <div class="row text-center mb-3">

            <div class="col-lg-3 col-md-6 mt-3" v-for="resep in reseps" :key="resep.id_resep">
              <div class="card ">
                <img :src="resep.gambar_resep" class="card-img-top" alt="error image" />
                <div class="card-body">
                  <h5 class="card-title">{{ resep.judul_resep }}</h5><br>
                  <router-link class="btn btn-outline-dark" style="font-size: medium;" :to="'/resep/'+resep.id_resep">Yuk Coba</router-link>
                </div>
              </div>
            </div>
            
          </div>
          <div class="d-grid col-12 mt-5 mx-auto">
            <a 
              href="/resep"
              class="btn" 
              style="background-color: #877f7d; color: #000; font-weight: bold; font-size: larger;"> 
              &gt;&gt; Klik Untuk melihat lebih Banyak Resep! &lt;&lt;
            </a>
          </div>
        </div>
      </section>
      <!-- Akhir Resep Populer -->

      <!-- Artikel -->

       
      <section class="review" id="review">
      <div class="container-fluid py-5" style="background-color: #FFEAB1">
        <div class="container">

          <!-- hapus -->
          <h1><strong>ARTIKEL</strong></h1>

          <!--  
          <div class="row text-center mb-5">
            <div class="col">
              <h2>Culinary Talk</h2>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-xl-6 mb-3">
              <div class="card">
                <img src="img/Corndog.jpg" class="card-img-top" alt="error img">
                <div class="card-body">
                <h5 class="card-title">Corndog Mozarella</h5>
                  <p class="card-text">Corndog Mozarella Cemilan Hits dari Kore</p>
                </div>
              </div>
            </div>

          <div class="col-xl-6 mb-3">
            <div class="card ">
              <div class="card-body">
                <h2 class="card-title">Tau ga sih Cemilan Corndog Mozarella?</h2>
                <br>
                <p> Bagi para pecinta hiburan Korea tentunya sudah mengetahui 
                  berbagai macam makanan atau jajanan negeri gingseng tersebut, 
                  salah satunya Corndog. Corndog adalah salah satu jajanan khas 
                  Korea Selatan yang mengombinasikan sosis dengan adonan tepung 
                  tebal. Sebelum digoreng, corndog juga dilapisi tepung jagung kasar. 
                  Variasi lainnya adalah corndog dilapisi kentang goreng.
                </p>
                <p>
                  Corndog sekarang banyak macamnya, tak hanya isian sosis namun
                  juga keju mozarella. Lapisan luarnya tak hanya pakai tepung 
                  jagung kasar, bisa juga gunakan kentang, mie yang dihancurkan, 
                  dan tepung roti. Buat kalian yang penasaran ingin mencicipi rasanya,
                  sekarang sudah banyak di Indonesia jajanan satu ini. 
                  Namun, kalian juga bisa coba membuat sendiri di rumah lho! 
                  yuk cara bikinnya dibawah ini:
                </p>
                <br>
                <a href="https://www.youtube.com/watch?v=FZB6hSsziQI" 
                    class="btn" 
                    style="background-color: #877f7d; color: #fff;">
                  Klik disini!</a>
              </div>
            </div>
          </div>
        </div>
         -->
      </div>
      </div>
      </section>

      <!-- Akhir Artikel -->

      <!-- Rekomendasi Tempat Jajan -->
      <section class="tempat" id="tempat">
        <div class="container">
          <div class="row mb-3">
            <div class="col-lg-6 col-md-8">
              <h2>Rekomendasi Tempat Jajan Favorit di Kota Bandung</h2>
            </div>
          </div>
          <div class="row justify">
            <div class="col-lg-8 col-md-12">
              <p>
                Wisata kuliner di berbagai tempat jajan yang enak, sampai tempat jajan 
                yang melegenda harus masuk agenda wajib ketika mengunjungi berbagai 
                daerah di Kota Bandung. Bukan hanya lidah yang akan dimanjakan dengan 
                ragam cita rasa, tapi mata juga akan di hipnotis dengan pemandangan 
                indah sebagai pelengkapnya.
              </p>
              <br />
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


            <div class="d-grid col-12 mt-5 mx-auto">
            <a 
              href="/kuliner"
              class="btn" 
              style="background-color: #877f7d; color: #000; font-weight: bold; font-size: larger;"> 
              &gt;&gt; Klik Untuk melihat lebih Banyak Tempat Kuliner! &lt;&lt;
            </a>
          </div>

          </div>
        </div>
      </section>
      <!-- Akhir Rekomendasi Tempat Jajan -->


      <Footer />
  </div>
</template>

<script>
import Navbar from "@/components/Navbar.vue"
import Footer from "@/components/Footer.vue"
import axios from "axios";

export default {
    name: 'Home',
    components: {
        Navbar,
        Footer
    },
    data() {
    return {
      reseps: [],
      kuliners: [],
    };
  },
  mounted() {
    this.getReseps();
    this.getKuliners();
  },
  methods: {
    async getReseps() {
      try {
        const response = await axios.get('resep');
        // Ambil hanya 4 data pertama
        this.reseps = response.data.slice(0, 4);
      } catch (error) {
        console.error("Terjadi kesalahan saat mengambil data:", error.message);
      }
    },
    async getKuliners() {
      try {
        const response = await axios.get('kuliner');
        // Ambil hanya 4 data pertama
        this.kuliners = response.data.slice(0, 4);
      } catch (error) {
        console.error("Terjadi kesalahan saat mengambil data:", error.message);
      }
    },
  },
}
</script>

<style>
/* SLIDER */
.d-block {
  max-height: 750px;
  max-width: 1600px;
}

.jajankuy {
  background-color: #ffeab1;
}


.resep {
  padding-top: 5rem;
  padding-bottom: 5rem;
}

/* Resep Populer */


h1 {
  color: #fff;
}

.text {
  color: #fff;
}

.card-text {
  font-size: 14px;
}

/* Tempat Rekomendasi */
.tempat {
  padding-top: 5rem;
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
</style>