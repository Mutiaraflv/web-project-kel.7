<template>
    <div>
        <Navbar />

        <div class="container">
            <div class="row mt-3">
                <div class="col-md-6">
                    <h2>Tambah Kuliner</h2>
                </div>
            </div>

           <form @submit.prevent="simpanKuliner">
                <div class="mb-3">
                    <label for="gambar_kuliner" class="form-label">Gambar Kuliner</label>
                    <p><input type="file" @change="handleFileChange" accept="image/*" required /></p>
                </div>
                <div class="mb-3">
                    <label for="nama_kuliner" class="form-label">Nama kuliner</label>
                    <input type="text"  v-model="nama_kuliner" class="form-control" placeholder="Nama kuliner">
                </div>
                <div class="mb-3">
                    <label for="penjelasan_singkat" class="form-label">Penjelasan singkat</label>
                    <input type="text" v-model="penjelasan_singkat" class="form-control" placeholder="Penjelasan singkat">
                </div>
                <div class="mb-3">
                    <label for="lokasi" class="form-label">Lokasi</label>
                    <input type="text" v-model="lokasi" class="form-control" placeholder="Lokasi">
                </div>
                <div class="mb-3">
                    <label for="jam_buka" class="form-label">Jam buka</label>
                    <input type="text" v-model="jam_buka" class="form-control" placeholder="Jam buka">
                </div>
                <div class="mb-3">
                    <label for="estimasi_makan" class="form-label">Estimasi makan</label>
                    <input type="text" v-model="estimasi_makan" class="form-control" placeholder="Estimasi makan">
                </div>
                <div class="mb-3">
                    <label for="tentang" class="form-label">Tentang kuliner anda</label>
                    <textarea type="text" v-model="tentang" class="form-control" placeholder="Tentang kuliner anda"></textarea>
                </div>
                <div class="mb-3">
                    <label for="maps" class="form-label">Maps</label>
                    <textarea type="text" v-model="maps" class="form-control" placeholder="Maps"></textarea>
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
    name: 'KulinerTambah',
    components: {
        Navbar,
        Footer
    },
  data() {
    return {
      gambar_kuliner: '',
      nama_kuliner: '',
      penjelasan_singkat: '',
      lokasi: '',
      jam_buka: '',
      estimasi_makan: '',
      tentang: '',
      maps: '',
    };
  },
  methods: {
    handleFileChange(event) {
      this.gambar_kuliner = event.target.files[0];
    },
    async simpanKuliner() {
      try {
        const formData = new FormData();
        formData.append('gambar_kuliner', this.gambar_kuliner);
        formData.append('nama_kuliner', this.nama_kuliner);
        formData.append('penjelasan_singkat', this.penjelasan_singkat);
        formData.append('lokasi', this.lokasi);
        formData.append('jam_buka', this.jam_buka);
        formData.append('estimasi_makan', this.estimasi_makan);
        formData.append('tentang', this.tentang);
        formData.append('maps', this.maps);

        await axios.post('kuliner/', formData, {
          headers: {
            'Content-Type': 'multipart/form-data',
          },
        });

        this.gambar_kuliner = '';
        this.nama_kuliner = '';
        this.penjelasan_singkat = '';
        this.lokasi = '';
        this.jam_buka = '';
        this.estimasi_makan = '';
        this.tentang = '';
        this.maps = '';

        this.$router.push('/kuliner');
      } catch (error) {
        console.error('Gagal menambahkan kuliner:', error);
      }
    },
  },
};
</script>

<style>

</style>
