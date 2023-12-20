<template>
  <div>
    <Navbar />
    <Artikel />
    <Footer />
  </div>
</template>

<script>
import Navbar from "@/components/Navbar.vue"
import Artikel from "@/components/Artikel.vue"
import Footer from "@/components/Footer.vue"
export default {
    name: "ArtikelList",
    components: {
        Navbar,
        Artikel,
        Footer
    }
}
</script>

<style>

</style>