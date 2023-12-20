<template>
  <div>
    <Navbar />
    <Resep />
    <Footer />
  </div>
</template>

<script>
import Navbar from "@/components/Navbar.vue"
import Resep from "@/components/Resep.vue"
import Footer from "@/components/Footer.vue"
export default {
    name: "ResepList",
    components: {
        Navbar,
        Resep,
        Footer
    }
}
</script>

<style>

</style>