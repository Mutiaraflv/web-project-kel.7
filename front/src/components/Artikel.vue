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
    <div style="margin-top:50px;" class="container">
      <div class="row">
        <div class="col-5"> 
          <div class="post-entry-1 bg-light" v-for="tb_artikel in artikel.slice(0,3)" :key="tb_artikel.id_artikel">
            <a href="post-single.html"><img :src="tb_artikel.gambar_artikel" alt="Image" class="img-fluid"></a>
          <div style="margin: 15px;">
            <router-link :to="'/artikel/'+tb_artikel.id_artikel">
            <h3>{{ tb_artikel.judul_artikel }}</h3>
            </router-link>
            <p style="margin-bottom: 10px; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">{{ tb_artikel.penjelasan }}</p>
           
            <span>
              <router-link style="font-size: small;  margin-bottom: 20px; " class="btn btn-warning" :to="{ name: 'ArtikelEdit', params: { id_artikel: tb_artikel.id_artikel } }">Edit</router-link>
              <button type="button" class="btn btn-danger" style="font-size: small; margin-bottom: 20px; font-size: small; margin-left: 10px;" @click="deleteArtikel(tb_artikel.id_artikel)">Delete</button>
            </span>
          </div>
          </div>
       </div>

        <div class="col">
          
          <div style="margin-bottom: 15px;" class="post-entry-2 d-flex bg-light" v-for="tb_artikel in artikel.slice(3)" :key="tb_artikel.id_artikel">
            <div class="thumbnail"><img :src="tb_artikel.gambar_artikel" style="max-width: 290px; height: auto;" alt="Image"></div>
            <div class="contents" style="margin-top: 15px; margin-left: 15px; margin-right: 15px;">
            <router-link :to="'/artikel/'+tb_artikel.id_artikel">
              <h5><a href="blog-single.html">{{ tb_artikel.judul_artikel }}</a></h5>
            </router-link>
              <p>
              <div style="margin-bottom: 5px; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical;">
                    {{ tb_artikel.penjelasan }}
              </div>
              <div style="float: right;">
                <router-link style="font-size: small;" class="btn btn-warning" :to="{ name: 'ArtikelEdit', params: { id_artikel: tb_artikel.id_artikel } }">Edit</router-link> 
                <span><button type="button" style="margin-left: 10px; font-size: small;" class="btn btn-danger" @click="deleteArtikel(tb_artikel.id_artikel)">Delete</button></span>
              </div>
              
              </p> 
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
<router-link class="btn btn-primary btn-lg rounded-circle" style="position: fixed; bottom: 30px; right: 30px; z-index: 1000;        background-color: #ffeab1; border-color: #ffeab1; border: 2px solid #877f7d;" :to="{ name: 'ArtikelTambah' }">
          <svg xmlns="http://www.w3.org/2000/svg" width="25" height="40" fill="#877f7d" class="bi bi-plus" viewBox="0 0 16 16">
          <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
          </svg>
        </router-link>
</template>

<script>
import axios from "axios";

export default {
  name: "Artikel",
  data() {
    return {
      artikel: [],
    };
  },
  mounted() {
    this.getArtikel();
  },
  methods: {
    async getArtikel() {
      try {
        const response = await axios.get('artikel');
        this.artikel = response.data;
      } catch (error) {
        console.error("Terjadi kesalahan saat mengambil data:", error.message);
      }
    },
    async deleteArtikel(id_artikel) {
      try {
        await axios.delete("artikel/" + id_artikel); 
        this.getArtikel();
      } catch (error) {
        console.log(error);
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
  background-image: url(../assets/img/gambar1.jpg);
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
  background-image: url(../assets/img/gambar2.jpg);
  background-size: cover;
}

.feature-2 {
  grid-area: feature-2;
  background-image: url(../assets/img/gambar3.jpg);
  background-size: cover;
}

.features .item {
  font-size: 2em;
  font-weight: 200;
}
.artikel-description {
  height: 50px; 
  overflow: hidden;
  text-overflow: ellipsis;
  display: -webkit-box;
  -webkit-line-clamp: 2; 
  -webkit-box-orient: vertical;
}

</style>
