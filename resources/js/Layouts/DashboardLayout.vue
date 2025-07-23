<script setup>
import { Link, usePage, router } from '@inertiajs/vue3'
import { ref } from 'vue'

import { showSuccess, showError} from '../Utils/VueToast.js';
import Footer from '../Components/Footer.vue'
import axios from 'axios';

const page = usePage()
const currentPath = page.url
const showSidebar = ref(false) // Hidden by default on small screens

function toggleSidebar() {
  showSidebar.value = !showSidebar.value
}

const logOut= async () =>{
  try{
    const response = await axios.get('/logout');
    if(response.status === 200){
      setTimeout(() => {
        router.visit("/login");
      }, 1000);
      showSuccess(response.data.data);
    }else{
      showError(response.data.data);
    }
  }catch(error){
    showError("Something went wrong");
  }
}

</script>

<template>
  <div class="d-flex flex-column min-vh-100">
    <!-- Header -->
    <nav class="navbar navbar-expand-xl navbar-light bg-light shadow-sm sticky-top">
      <div class="container-fluid">
        <div class="d-flex align-items-center">
          <!-- Toggle sidebar button (only visible on small screens) -->
          <button class="btn btn-outline-secondary me-2 d-xl-none" @click="toggleSidebar">
            <i class="bi bi-list"></i>
          </button>

          <Link href="/" class="navbar-brand d-flex align-items-center mb-0 h1">
            Admin
          </Link>
        </div>

        <div class="d-flex gap-3 ms-auto">
          <Link href="#"><i class="bi bi-twitter-x"></i></Link>
          <Link href="#"><i class="bi bi-facebook"></i></Link>
          <Link href="#"><i class="bi bi-instagram"></i></Link>
          <Link href="#"><i class="bi bi-linkedin"></i></Link>
          <Link @click="logOut()" class="btn btn-sm text-white shadow-sm" style="background-color: #34b7a7;">Log Out</Link>
        </div>
      </div>
    </nav>

    <!-- Layout -->
    <div class="d-flex flex-grow-1">
      <!-- Sidebar -->
      <aside
        class="bg-white border-end shadow-sm p-3 position-relative"
        :class="{
          'd-none d-xl-block': !showSidebar,     // Hide on small if not toggled
          'd-block': showSidebar,                // Show on small when toggled
          'd-xl-block': true                     // Always show on xl+
        }"
        style="width: 240px;"
      >
        <!-- Close button for mobile -->
        <button
          class="btn btn-sm btn-outline-danger d-xl-none mb-3"
          @click="toggleSidebar"
        >
          <i class="bi bi-x-lg"></i> Close
        </button>

        <ul class="nav flex-column">
          <li class="nav-item mb-2">
            <Link :href="'/dashboard'" class="nav-link" :class="{ active: currentPath === '/dashboard' }">
              <i class="bi bi-speedometer2 me-2"></i> Dashboard
            </Link>
          </li>
          <li class="nav-item mb-2">
            <Link :href="'/users'" class="nav-link" :class="{ active: currentPath === '/users' }">
              <i class="bi bi-people me-2"></i> Users
            </Link>
          </li>
          <li class="nav-item mb-2">
            <Link :href="'/messages'" class="nav-link" :class="{ active: currentPath === '/messages' }">
              <i class="bi bi-chat-dots me-2"></i> Messages
            </Link>
          </li>
          <li class="nav-item mb-2">
            <Link :href="'/settings'" class="nav-link" :class="{ active: currentPath === '/settings' }">
              <i class="bi bi-gear me-2"></i> Settings
            </Link>
          </li>
        </ul>
      </aside>

      <!-- Main content -->
      <main class="p-4 flex-grow-1 bg-light">
        <slot />
      </main>
    </div>

    <!-- Footer -->
    <Footer />
  </div>
</template>

<style scoped>
.nav-link.active {
  font-weight: bold;
  color: #34b7a7 !important;
}
</style>
