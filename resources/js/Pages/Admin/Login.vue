<script setup>
import { onMounted } from "vue";
import { Link } from '@inertiajs/vue3'

import AOS from "aos";
import AdminHeader from '../../Components/Admin/AdminHeader.vue';
import Footer from '../../Components/Footer.vue';

onMounted(() => {
    AOS.init();
})

</script>

<template>
<AdminHeader />
<div class="d-flex justify-content-center align-items-center vh-100" data-aos="zoom-in">
    <div class="card p-4 shadow-sm" style="width: 100%; max-width: 400px;">
      <h4 class="text-center mb-4"> Admin Login</h4>

      <form>
        <div class="mb-3">
          <label for="email" class="form-label">Email address</label>
          <input type="email" class="form-control" id="email" required />
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" required />
        </div>

        <div class="mb-3 d-flex justify-content-between align-items-center">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="rememberMe" />
            <label class="form-check-label" for="rememberMe">Remember me</label>
          </div>
          <Link href="/send-email" class="text-decoration-none">Forgot password?</Link>
        </div>

        <div class="d-grid">
          <button type="submit" class="btn text-white shadow" style="background-color: #34b7a7;">Login</button>
        </div>
      </form>
      <div class="text-center mt-3">
        <Link href="/" class="text-decoration-none">Back to Public Site</Link>
      </div>
    </div>
  </div>
  <Footer />
</template>

<style scoped>

</style>
