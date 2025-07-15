<script setup>
import { usePage } from '@inertiajs/vue3'

const page = usePage()
const currentPath = page.url
</script>

<template>
 <!-- Header -->
    <header id="header" class="header d-flex align-items-center light-background sticky-top">
      <div class="container-fluid position-relative d-flex align-items-center justify-content-between">
        <a href="/" class="logo d-flex align-items-center me-auto me-xl-0">
          <h1 class="sitename">Jahid</h1>
        </a>

        <nav id="navmenu" class="navmenu">
          <ul>
            <li><a :href="'/'" :class="{ active: currentPath === '/' }">Home</a></li>
            <li><a :href="'/about'" :class="{ active: currentPath === '/about' }">About</a></li>
            <li><a :href="'/resume'" :class="{ active: currentPath === '/resume' }">Resume</a></li>
            <li><a :href="'/services'" :class="{ active: currentPath === '/services' }">Services</a></li>
            <li><a :href="'/contact'" :class="{ active: currentPath === '/contact' }">Contact</a></li>

            <!-- <li class="dropdown">
              <a href="#"><span>Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
              <ul>
                <li><a href="#">Dropdown 1</a></li>
                <li class="dropdown">
                  <a href="#"><span>Deep Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                  <ul>
                    <li><a href="#">Deep Dropdown 1</a></li>
                    <li><a href="#">Deep Dropdown 2</a></li>
                  </ul>
                </li>
              </ul>
            </li> -->
          </ul>
          <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        <div class="header-social-links">
          <a href="#"><i class="bi bi-twitter-x"></i></a>
          <a href="#"><i class="bi bi-facebook"></i></a>
          <a href="#"><i class="bi bi-instagram"></i></a>
          <a href="#"><i class="bi bi-linkedin"></i></a>
        </div>
      </div>
    </header>
</template>

<style scoped>

</style>
