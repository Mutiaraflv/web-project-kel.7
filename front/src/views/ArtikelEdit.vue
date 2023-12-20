<template>
  <div>
    <Navbar />
    <div style="background-color: #c4a972; padding-bottom: 75px;">
      <div class="col-lg-10 col-md-12">
        <h2 class="mb-4" style="color: #161205; padding-top: 50px; margin-left: 40px;">Edit Artikel</h2>

        <form @submit.prevent="updateArtikel" style="margin-left: 40px;">
          <div class="mb-3">
            <label for="judul_artikel" class="form-label">Judul Artikel</label>
            <input v-model="artikel.judul_artikel" type="text" id="judul_artikel" class="form-control" placeholder="Masukkan judul" required>
          </div>

          <div class="mb-3">
            <label for="penjelasan" class="form-label">Penjelasan</label>
            <textarea style="height: 300px;" v-model="artikel.penjelasan" id="penjelasan" class="form-control" placeholder="Masukkan penjelasan" required></textarea>
          </div>

          <div class="mb-3">
            <label for="gambar_artikel" class="form-label">Gambar Artikel</label>
            <input type="file" @change="handleFileChange" id="gambar_artikel" class="form-control">
          </div>

          <button type="submit" style="width: 100px;" class="btn btn-primary">Edit</button>
        </form>
      </div>
    </div> 
  </div>
</template>

<script>
import axios from "axios";
import Navbar from "@/components/Navbar.vue";
import Footer from "@/components/Footer.vue";

export default {
  name: 'ArtikelEdit',
  data() {
    return {
      artikel: {
        judul_artikel: '',
        penjelasan: '',
        gambar_artikel: null,
      },
    };
  },
  methods: { 
    async getArtikel() {
      try {
        const artikelId = this.$route.params.id_artikel;
        const response = await axios.get(`http://localhost:8080/artikel/${artikelId}`);
        this.artikel = response.data;
      } catch (error) {
        console.error(error.message);
      }
    },

    handleFileChange(event) {
      this.artikel.gambar_artikel = event.target.files[0];
    },
    
    updateArtikel() {
      const artikelId = this.$route.params.id_artikel;
      const formData = new FormData();

      formData.append('judul_artikel', this.artikel.judul_artikel);
      formData.append('penjelasan', this.artikel.penjelasan);
      formData.append('gambar_artikel', this.artikel.gambar_artikel);

      axios.post(`http://localhost:8080/artikel/${artikelId}`, formData)
        .then(response => {
          console.log(response.data.message);
          this.$router.push("/artikel");
        })
        .catch(error => {
          console.error(error.response.data.message);
        });
    },
  },
  created() { 
    this.getArtikel();
  },
  components: {
    Navbar,
    Footer,
  },
};
</script>

<style scoped>
.btn-primary {
  background-color: #161205;
  color: #c4a972;
  border: none;
}

.btn-primary:hover {
  background-color: #c4a972;
  color: #161205;
}
</style>
