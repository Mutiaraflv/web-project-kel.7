<template id="top">
 <Navbar />

<div class="wrapper col4" style="background-color: #ede9e4">
  <div id="container">
    <div id="content">
    <h1 style="font-size: 50px; font-family: Georgia; color: #471a12;">{{ artikel.judul_artikel }}</h1> 
      <div id="featured_post"><img :src="artikel.gambar_artikel" style="margin-bottom: 10px;" alt="error image" />
        <pre style="color: #0f0a05; white-space: pre-wrap; font-family: Arial; font-size: 20px;">{{ artikel.penjelasan }}</pre>
        
      </div>
    </div>
    <div id="column">
      <ul id="latestnews">
        <li v-for="relatedArticle in relatedArticles" :key="relatedArticle.id">
            <img :src="relatedArticle.gambar_artikel" style="width: 85px;" alt="" />
            <p>
                <strong><a :href="'/artikel/' + relatedArticle.id_artikel">{{ relatedArticle.judul_artikel }}</a></strong>
                <div style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                    {{ relatedArticle.penjelasan }}
                </div>
            </p>
        </li>
      </ul>
    </div>
    <br class="clear" />
  </div>
  <br class="clear" />
</div>


<div class="wrapper col7">
  <div id="copyright">
    <p class="fl_left"><a href="#"></a></p>
    <p class="fl_right">Kelompok 7</p>
    <br class="clear" />
  </div>
</div>


</template>

<script>
import Navbar from "@/components/Navbar.vue"
import Footer from "@/components/Footer.vue"

import axios from "axios";

export default {
    name: 'ArtikelDetail',
    components: {
        Navbar,
        Footer
    },
    data() {
        return {
            artikel: {},
            relatedArticles: [] 
        }
    },
    methods: {
        setArtikel(data) {
            this.artikel = data;
        },
        setRelatedArticles(data) {
            this.relatedArticles = data.slice(0, 5);
        },
        async deleteArtikel(id_artikel) {
            try {
                await axios.delete("artikel/"+this.$route.params.id_artikel);
                this.$router.push("/artikel");
            } catch (error) {
                console.log(error);
            }
        }
    },
    mounted() {
        axios.get("artikel/"+this.$route.params.id_artikel)
            .then((response) => this.setArtikel(response.data))
            .catch((error) => console.log(error));

    
        axios.get("artikel")
        .then((response) => {
            
            const filteredArticles = response.data
                .filter(artikel => artikel.id_artikel !== this.$route.params.id_artikel)
                .slice(0, 5);

            
            this.setRelatedArticles(filteredArticles);
        })
        .catch((error) => console.log(error));
    } 
}
</script>


<style scoped src="../assets/layout/styles/layout.css">
@import '../assets/layout/styles/layout.css';

</style>