<script setup>
import { onMounted } from 'vue'
import AOS from 'aos'
import HeaderPart from '../Components/HeaderPart.vue'
import Footer from '../Components/Footer.vue'

onMounted(() => {
  AOS.init()

  // ✅ Hide preloader
  window.addEventListener('load', () => {
    const preloader = document.getElementById('preloader')
    if (preloader) {
      preloader.style.display = 'none'
    }
  })

  // ✅ Scroll Top Logic
  const scrollTopBtn = document.getElementById('scroll-top')

  // Show/hide scroll button
  window.addEventListener('scroll', () => {
    if (scrollTopBtn) {
      if (window.scrollY > 100) {
        scrollTopBtn.classList.add('active')
      } else {
        scrollTopBtn.classList.remove('active')
      }
    }
  })

})
</script>



<template>
  <div class="index-page">

    <!-- Header Section-->
    <HeaderPart />

    <!-- Main Content -->
    <main class="main">
      <!-- Hero Section -->
      <section id="hero" class="hero section">
        <img :src="'/assets/img/hero-bg.jpg'" alt="" data-aos="fade-in">
        <div class="container text-center" data-aos="zoom-out" data-aos-delay="100">
          <div class="row justify-content-center">
            <div class="col-lg-8">
              <h2>Jahid Hasan</h2>
              <p>I'm a Professional Web Developer From Bangladesh</p>
              <a href="/about" class="btn-get-started">About Me</a>
            </div>
          </div>
        </div>
      </section>
    </main>

    <!-- Footer -->
   <Footer />

    <!-- Scroll Top & Preloader -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center">
      <i class="bi bi-arrow-up-short"></i>
    </a>
    <div id="preloader"></div>
  </div>
</template>
<style scoped>

</style>

