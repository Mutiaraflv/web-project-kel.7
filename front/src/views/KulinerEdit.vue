<template>
    <div>
        <Navbar />

        <div class="container">
            <div class="row mt-3">
                <div class="col-md-6">
                    <h2>Edit Kuliner</h2>
                </div>
            </div>

           <form @submit.prevent="updateKuliner">
                <div class="mb-3">
                    <label for="nama_kuliner" class="form-label">Nama kuliner</label>
                    <input type="text"  v-model="kuliner.nama_kuliner" class="form-control" placeholder="Nama kuliner">
                </div>
                <div class="mb-3">
                    <label for="penjelasan_singkat" class="form-label">Penjelasan singkat</label>
                    <input type="text" v-model="kuliner.penjelasan_singkat" class="form-control" placeholder="Penjelasan singkat">
                </div>
                <div class="mb-3">
                    <label for="lokasi" class="form-label">Lokasi</label>
                    <input type="text" v-model="kuliner.lokasi" class="form-control" placeholder="Lokasi">
                </div>
                <div class="mb-3">
                    <label for="jam_buka" class="form-label">Jam buka</label>
                    <input type="text" v-model="kuliner.jam_buka" class="form-control" placeholder="Jam buka">
                </div>
                <div class="mb-3">
                    <label for="estimasi_makan" class="form-label">Estimasi makan</label>
                    <input type="text" v-model="kuliner.estimasi_makan" class="form-control" placeholder="Estimasi makan">
                </div>
                <div class="mb-3">
                    <label for="tentang" class="form-label">Tentang kuliner anda</label>
                    <textarea type="text" v-model="kuliner.tentang" class="form-control" placeholder="Tentang kuliner anda"></textarea>
                </div>
                <div class="mb-3">
                    <label for="maps" class="form-label">Maps</label>
                    <textarea type="text" v-model="kuliner.maps" class="form-control" placeholder="Maps"></textarea>
                </div>
                <div class="mb-3">
                    <label for="gambar_kuliner" class="form-label">Gambar Kuliner</label>
                    <input type="file" @change="handleFileChange" id="gambar_kuliner" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form> 
            
        </div>

        <Footer />
    </div>
</template>

<script>
import axios from "axios";
import Navbar from "@/components/Navbar.vue"
import Footer from "@/components/Footer.vue"

export default {
    name: 'KulinerEdit',
    data() {
        return {
            kuliner: {
                nama_kuliner: '',
                penjelasan_singkat: '',
                lokasi: '',
                jam_buka: '',
                estimasi_makan: '',
                tentang: '',
                maps: '',
                gambar_kuliner: null,
            },
        };
    },
    
    methods: {
        async getKuliner() {
            try {
                const kulinerId = this.$route.params.id_kuliner;
                const response = await axios.get(`http://localhost:8080/kuliner/${kulinerId}`);
                this.kuliner = response.data;
            } catch (error) {
                console.error(error.message);
            }
        },
        
        handleFileChange(event) {
            this.kuliner.gambar_kuliner = event.target.files[0];
        },
        updateKuliner() {
            const kulinerId = this.$route.params.id_kuliner; 
            const formData = new FormData();

            formData.append('nama_kuliner', this.kuliner.nama_kuliner);
            formData.append('penjelasan_singkat', this.kuliner.penjelasan_singkat);
            formData.append('lokasi', this.kuliner.lokasi);
            formData.append('jam_buka', this.kuliner.jam_buka);
            formData.append('estimasi_makan', this.kuliner.estimasi_makan);
            formData.append('tentang', this.kuliner.tentang);
            formData.append('maps', this.kuliner.maps);
            formData.append('gambar_kuliner', this.kuliner.gambar_kuliner);

            axios.post(`http://localhost:8080/kuliner/${kulinerId}`, formData)
                .then(response => {
                console.log(response.data.message); 
                this.$router.push("/kuliner");
                })
                .catch(error => {
                console.error(error.response.data.message);
                });
        },
    },
    created() {
        this.getKuliner();
    },
    components: {
        Navbar,
        Footer
    },
}
</script>

<style>

</style>