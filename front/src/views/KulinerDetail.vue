<template>
  <div>
    <Navbar />

    <!-- Kuliner -->
    <section id="jajankuy" class="jajankuy">
        <div class="container-fluid py-5">
        <div class="container">
            
            <div class="row justify-content-center">
            <div class="col-lg-6 col-md-12">
                <img :src="kuliner.gambar_kuliner" class="img-fluid" alt="error image" />
            </div>
            <div class="col-lg-5 col-md-10 ">
                <h2>{{ kuliner.nama_kuliner }}</h2>
                <p>{{ kuliner.penjelasan_singkat }}</p>
                <p>Lokasi : {{ kuliner.lokasi }}</p>
                <p>Jam buka : {{ kuliner.jam_buka }}</p>
                <p>Estimasi makan : {{ kuliner.estimasi_makan }}</p>
                
            </div>
            <div class="col-lg-1 col-md-2 d-flex justify-content-end">
                <router-link :to="{ name: 'KulinerEdit' }" style="height: 25px; margin-top: 7px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#343a40" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                    </svg>
                </router-link>
                <button class="btn btn-outline-transparent" type="submit" @click="deleteKuliner(kuliner.id_kuliner)" style="height: 25px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#343a40" class="bi bi-trash" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                    </svg>
                </button>
            </div>
            </div>
        </div>
        </div>
    </section>
    <!-- Akhir Kuliner -->

    

    <!-- Tentang -->
    <section id="galeri" class="galeri" style="background-color: #ffeab1">
        <div class="container-fluid">
        <div class="container">
            <div class="row mb-3">
            <div class="col-12 text-center py-5">
                <h2>Tentang {{ kuliner.nama_kuliner }}</h2><br>
                <p style="font-size: large;">{{ kuliner.tentang }}</p>
            </div>
            </div>

            <div class="row">
            

            </div>
        </div>
        </div>
    </section>
    <!-- Akhir Tentang -->

    <!-- Gelombang  -->
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#ffeab1" fill-opacity="1"
        d="M0,320L34.3,288C68.6,256,137,192,206,176C274.3,160,343,192,411,218.7C480,245,549,267,617,250.7C685.7,235,754,181,823,160C891.4,139,960,149,1029,170.7C1097.1,192,1166,224,1234,240C1302.9,256,1371,256,1406,256L1440,256L1440,0L1405.7,0C1371.4,0,1303,0,1234,0C1165.7,0,1097,0,1029,0C960,0,891,0,823,0C754.3,0,686,0,617,0C548.6,0,480,0,411,0C342.9,0,274,0,206,0C137.1,0,69,0,34,0L0,0Z">
        </path>
    </svg>
    <!-- Akhir Gelombang -->

    <!-- Maps -->
    <section>
        <div class="container">
        <div class="row mb-3">
            <div class="col-12 text-center py-5">
            <h2>Maps</h2>
            </div>
        </div>
        <div class="row mb-3 justify-content-center" style="height: 500px;">
            <iframe :src="kuliner.maps"></iframe>
        </div>
        </div>
    </section>

    <Footer />
  </div>
</template>

<script>
import Navbar from "@/components/Navbar.vue"
import Footer from "@/components/Footer.vue"
import axios from "axios";

export default {
    name: 'KulinerDetail',
    components: {
        Navbar,
        Footer
    },
    data() {
        return {
            kuliner: {}
            }
    },
    methods: {
        setKuliner(data) {
            this.kuliner = data
        },
        async deleteKuliner(id_kuliner) {
            try {
                await axios.delete("kuliner/"+this.$route.params.id_kuliner);
                this.$router.push("/kuliner");
            } catch (error) {
                console.log(error);
            }
        }
    },
    mounted() {
        axios
        .get("kuliner/"+this.$route.params.id_kuliner)
        .then((response) => this.setKuliner(response.data))
        .catch((error) => console.log(error));
    } 
}
</script>

<style>

</style>