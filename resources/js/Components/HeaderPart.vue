<script setup>
import { Link, usePage } from '@inertiajs/vue3'

const page = usePage()
const currentPath = page.url

const user = page.props.auth.user
const loggedIn = page.props.auth.loggedIn

</script>

<template>
  <nav class="navbar navbar-expand-xl navbar-light bg-light shadow-sm sticky-top">
    <div class="container-fluid">
      <!-- Logo -->
      <Link href="/" class="navbar-brand d-flex align-items-center">
        <h1 class="sitename mb-0" data-aos="zoom-in">Jahid</h1>
      </Link>

      <!-- Mobile Toggle -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Centered Navigation Links -->
      <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
        <ul class="navbar-nav mb-2 mb-xl-0">
          <li class="nav-item">
            <Link :href="'/'" class="nav-link" :class="{ active: currentPath === '/' }">Home</Link>
          </li>
          <li class="nav-item">
            <Link :href="'/about'" class="nav-link" :class="{ active: currentPath === '/about' }">About</Link>
          </li>
          <li class="nav-item">
            <Link :href="'/resume'" class="nav-link" :class="{ active: currentPath === '/resume' }">Resume</Link>
          </li>
          <li class="nav-item">
            <Link :href="'/services'" class="nav-link" :class="{ active: currentPath === '/services' }">Services</Link>
          </li>
          <li class="nav-item">
            <Link :href="'/contact'" class="nav-link" :class="{ active: currentPath === '/contact' }">Contact</Link>
          </li>
        </ul>
      </div>

      <!-- Social Icons aligned right -->
      <div class="d-flex gap-3 ms-auto">
        <Link href="#"><i class="bi bi-twitter-x"></i></Link>
        <Link href="#"><i class="bi bi-facebook"></i></Link>
        <Link href="#"><i class="bi bi-instagram"></i></Link>
        <Link href="#"><i class="bi bi-linkedin"></i></Link>
         <!-- Show Dashboard link if loggedIn is true, else show Login -->

          <Link v-if="loggedIn" href="/dashboard" class="btn btn-sm text-white shadow-sm" style="background-color: #34b7a7;">Dashboard</Link>


          <Link v-if="!loggedIn" href="/login" class="btn btn-sm text-white shadow-sm" style="background-color: #34b7a7;">Admin Login</Link>

      </div>
    </div>
  </nav>
</template>

<style scoped>
.sitename {
  font-size: 2.75rem;
  text-shadow: 1px 1px 3px #34b7a7;
  font-weight: bold;
  color: #34b7a7;
}
.nav-link.active {
  font-weight: bold;
  color: #34b7a7 !important;
}
.btn:hover {
  opacity: 0.9;
}
</style>
