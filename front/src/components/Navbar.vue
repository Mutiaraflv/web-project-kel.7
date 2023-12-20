<template>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top" style="background-color: #877f7d">
      <div class="container">
        <a class="navbar-brand" href="/" style="font-weight: 700; font-size: 20px;">
          <img
            src="../assets/img/logo.png"
            alt=""
            width="30"
            class="d-inline-block align-text-top me-3"
          />
          KulinerBandung</a
        >
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav mx-auto">
            <li class="nav-item mx-2">
              <a class="nav-link" aria-current="page" href="/" style="font-size: 16px; color: #ffeab1;">Home</a>
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link" aria-current="page" href="/kuliner" style="font-size: 16px; color: #ffeab1;">Kuliner</a>
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link" aria-current="page" href="/resep" style="font-size: 16px; color: #ffeab1;">Resep</a>
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link" aria-current="page" href="/artikel" style="font-size: 16px; color: #ffeab1;">Artikel</a>
            </li>
          </ul>
          <form class="d-flex">
            <input
              class="form-control me-2"
              type="search"
              placeholder="Search"
              aria-label="Search"
            />
            <button type="button" class="btn btn-outline-light" style="width: 133px; height: 40px; font-size: 16px; font-weight: 400;">Search</button>
          </form>
        </div>
      </div>
    </nav>
    <!-- Akhir Navbar -->
</template>

<script>
export default {
    name : 'Navbar'
}
</script>

<style>

</style>