<template>
<Navbar />
  <div style="background-color: #c4a972; padding-bottom: 75px;">
    <div class="col-lg-10 col-md-12">
      <h2 class="mb-4" style="color: #161205; padding-top: 50px; margin-left: 40px;">Artikel</h2>

      <form @submit.prevent="simpanArtikel" style="margin-left: 40px;">
        <div class="mb-3">
          <label for="exampleFormControlFile1" class="form-label" style="color: #161205;">Gambar artikel</label>
          <input input type="file" @change="handleFileChange" accept="image/*"  class="form-control" required />
        </div>


        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label" style="color: #161205;">Judul</label>
          <input type="text" v-model="judul_artikel" class="form-control" placeholder="Masukkan judul artikel">
        </div>

        <div class="mb-3">
          <label for="exampleFormControlTextarea1" class="form-label" style="color: #161205;">Penjelasan</label>
          <textarea v-model="penjelasan" class="form-control" style="height: 175px; resize: none;" placeholder="Masukkan teks artikel..."></textarea>
        </div>

        <button type="submit" class="btn" style="background-color: #161205; color: #c4a972; border: none;">Submit</button>
        
      </form>
    </div>
  </div>
</template>


<script>
  import axios from "axios";
  import Navbar from "@/components/Navbar.vue"
  export default {
    name: 'ArtikelTambah',
    components: {
      Navbar,
    },
    data() {
      return {
        gambar_artikel: '',
        judul_artikel: '',
        penjelasan: '', 
      };
    },
    methods: {
      handleFileChange(event) {
        this.gambar_artikel = event.target.files[0];
      },
      async simpanArtikel() {
        try {
          const formData = new FormData();
          formData.append('gambar_artikel', this.gambar_artikel);
          formData.append('judul_artikel', this.judul_artikel);
          formData.append('penjelasan', this.penjelasan); 

          await axios.post('artikel/', formData, {
            headers: {
              'Content-Type': 'multipart/form-data',
            },
          });

          this.gambar_artikel = '';
          this.judul_artikel = '';
          this.penjelasan = ''; 

          this.$router.push('/artikel');
        } catch (error) {
          console.error('Gagal menambahkan artikel:', error);
        }
      },
    },
  };
</script>

<style>
    .btn-prm {
    background-color: #161205;
    color: #c4a972;
    border: none;
  }

  .btn-prm:hover {
    background-color: #c4a972;
    color: #161205;
  }
</style>