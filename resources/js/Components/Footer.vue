<script setup>
import {Link} from '@inertiajs/vue3'

</script>

<template>
<footer class="bg-light border-top py-3">
      <div class="container">
        <p class="text-center mb-1">
          © <strong>Jahid Hasan</strong> All Rights Reserved
        </p>
        <div class="d-flex justify-content-center mb-2 gap-3">
          <Link href="#"><i class="bi bi-twitter-x"></i></Link>
          <Link href="#"><i class="bi bi-facebook"></i></Link>
          <Link href="#"><i class="bi bi-instagram"></i></Link>
          <Link href="#"><i class="bi bi-linkedin"></i></Link>
        </div>
        <div class="text-center">
          Template by <Link href="https://bootstrapmade.com/">BootstrapMade</Link> |
          Integrated with Laravel, Inertia & Vue by <strong>Jahid Hasan</strong>
        </div>
      </div>
    </footer>

</template>

<style scoped>

</style>
