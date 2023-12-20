<template>

    <div>
        <Navbar />
        <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 align-items-center my-5">
                <div class="col-lg-7" >
                    <h1 class="font-weight-light">{{ resep.judul_resep }}</h1>
                    <p>{{ resep.penjelasan }}</p>
                    <div class="kotak kotak3">
                        <tbody>
                            <tr>
                                <th scope="row">Bahan-bahan</th>
                                    <td>
                                        <p>{{ resep.bahan }}</p>
                                    </td>
                                </tr>
                                <br>
                                <tr>
                            <th scope="row">Cara Membuat</th>
                        <td><p>{{ resep.langkah }}</p></td>
                    </tr>
                </tbody>
                <br>
                <router-link class="btn btn-primary" :to="{ name: 'ResepEdit' }">Edit</router-link>&nbsp;
                <button type="submit" class="btn btn-danger" @click="deleteResep(resep.id_resep)">Delete</button>
        </div>
        </div>
                <div class="col-lg-5">
                    <img :src="resep.gambar_resep" class="card-img-top" alt="error image" />
                </div>
            </div>
            
        </div>
        <Footer />
</div>

</template>

<script>
import Navbar from "@/components/Navbar.vue"
import Footer from "@/components/Footer.vue"
import axios from "axios";

export default {
    name: 'ResepDetail',
    components: {
        Navbar,
        Footer
    },
    data() {
        return {
            resep: {}
            }
    },
    methods: {
        setResep(data) {
            this.resep = data
        },
        async deleteResep(id_resep) {
            try {
                await axios.delete("resep/"+this.$route.params.id_resep);
                this.$router.push("/resep");
            } catch (error) {
                console.log(error);
            }
        }
    },
    mounted() {
        axios
        .get("resep/"+this.$route.params.id_resep)
        .then((response) => this.setResep(response.data))
        .catch((error) => console.log(error));
    } 
}
</script>

<style>
footer {
  padding: 5px;
  background-color: #ffeab1;
  text-align: center;
}

.kotak {
  background: #fcfcfc;
  padding: 20px;
  width: 700px;
  float: left;
  margin: 20px;
  height: 600px;
}

.kotak3 {
  border-radius: 2px 140px 20px 60px;
}

</style>