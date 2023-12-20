<template>
    <div>
        <Navbar />

        <div class="container">
            <div class="row mt-3">
                <div class="col-md-6">
                    <h2>Tambah Resep</h2>
                </div>
            </div>

           <form @submit.prevent="simpanResep">
                <div class="mb-3">
                    <label for="gambar_resep" class="form-label">Gambar Resep</label>
                    <p><input type="file" @change="handleFileChange" accept="image/*" required /></p>
                </div>
                <div class="mb-3">
                    <label for="judul_resep" class="form-label">Judul Resep</label>
                    <input type="text"  v-model="judul_resep" class="form-control" placeholder="Judul Resep">
                </div>
                <div class="mb-3">
                    <label for="penjelasan" class="form-label">Penjelasan singkat</label>
                    <input type="text" v-model="penjelasan" class="form-control" placeholder="Penjelasan singkat">
                </div>
                <div class="mb-3">
                    <label for="bahan" class="form-label">Bahan-bahan</label>
                    <textarea type="text" v-model="bahan" class="form-control" placeholder="Bahan-bahan"></textarea>
                </div>
                <div class="mb-3">
                    <label for="langkah" class="form-label">Cara Membuat</label>
                    <textarea type="text" v-model="langkah" class="form-control" placeholder="Langkah-langkah"></textarea>
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
    name: 'ResepTambah',
    components: {
        Navbar,
        Footer
    },
  data() {
    return {
      gambar_resep: '',
      judul_resep: '',
      penjelasan: '',
      bahan: '',
      langkah: '',
    };
  },
  methods: {
    handleFileChange(event) {
      this.gambar_resep = event.target.files[0];
    },
    async simpanResep() {
      try {
        const formData = new FormData();
        formData.append('gambar_resep', this.gambar_resep);
        formData.append('judul_resep', this.judul_resep);
        formData.append('penjelasan', this.penjelasan);
        formData.append('bahan', this.bahan);
        formData.append('langkah', this.langkah);

        await axios.post('resep/', formData, {
          headers: {
            'Content-Type': 'multipart/form-data',
          },
        });

        this.gambar_resep = '';
        this.judul_resep = '';
        this.penjelasan = '';
        this.bahan = '';
        this.langkah = '';

        this.$router.push('/resep');
      } catch (error) {
        console.error('Gagal menambahkan resep:', error);
      }
    },
  },
};
</script>

<style>

</style>
