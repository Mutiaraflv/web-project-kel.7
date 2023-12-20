<template>
    <div>
        <Navbar />

        <div class="container">
            <div class="row mt-3">
                <div class="col-md-6">
                    <h2>Edit Resep</h2>
                </div>
            </div>

           <form @submit.prevent="updateResep">
                <div class="mb-3">
                    <label for="judul_resep" class="form-label">Judul Resep</label>
                    <input type="text"  v-model="resep.judul_resep" id="judul_resep" class="form-control" placeholder="Judul Resep">
                </div>
                <div class="mb-3">
                    <label for="penjelasan" class="form-label">Penjelasan singkat</label>
                    <input type="text" v-model="resep.penjelasan" id="penjelasan" class="form-control" placeholder="Penjelasan singkat">
                </div>
                <div class="mb-3">
                    <label for="bahan" class="form-label">Bahan-bahan</label>
                    <textarea type="text" v-model="resep.bahan" class="form-control" id="bahan" placeholder="Bahan-bahan"></textarea>
                </div>
                <div class="mb-3">
                    <label for="langkah" class="form-label">Cara Membuat</label>
                    <textarea type="text" v-model="resep.langkah" id="langkah" class="form-control" placeholder="Langkah-langkah"></textarea>
                </div>
                <div class="mb-3">
                    <label for="gambar_resep" class="form-label">Gambar Resep</label>
                    <input type="file" @change="handleFileChange" id="gambar_resep" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form> 
            
        </div>

        <Footer />
    </div>
</template>

<script>
import axios from "axios";
import Navbar from "@/components/Navbar.vue";
import Footer from "@/components/Footer.vue";

export default {
  name: 'ResepEdit',
  data() {
    return {
      resep: {
        judul_resep: '',
        penjelasan: '',
        bahan: '',
        langkah: '',
        gambar_resep: null,
      },
    };
  },
  methods: {
    async getResep() {
      try {
        const resepId = this.$route.params.id_resep;
        const response = await axios.get(`http://localhost:8080/resep/${resepId}`);
        this.resep = response.data;
      } catch (error) {
        console.error(error.message);
      }
    },

    handleFileChange(event) {
      this.resep.gambar_resep = event.target.files[0];
    },
    updateResep() {
      const resepId = this.$route.params.id_resep; 
      const formData = new FormData();

      formData.append('judul_resep', this.resep.judul_resep);
      formData.append('penjelasan', this.resep.penjelasan);
      formData.append('bahan', this.resep.bahan);
      formData.append('langkah', this.resep.langkah);
      formData.append('gambar_resep', this.resep.gambar_resep);

      axios.post(`http://localhost:8080/resep/${resepId}`, formData)
        .then(response => {
          console.log(response.data.message); 
          this.$router.push("/resep");
        })
        .catch(error => {
          console.error(error.response.data.message);
        });
    },
  },
  created() {
    this.getResep();
  },
  components: {
    Navbar,
    Footer,
  },
};
</script>

<style>

</style>