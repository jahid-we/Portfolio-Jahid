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
      <h4 class="text-center mb-4">Forgot Password</h4>

      <p class="text-muted text-center mb-3">
        Enter your email and we'll send you a password reset link.
      </p>

      <form>
        <div class="mb-3">
          <label for="email" class="form-label">Email address</label>
          <input type="email" class="form-control" id="email" required />
        </div>

        <div class="d-grid">
          <button type="submit" class="btn text-white shadow" style="background-color: #34b7a7;">Send Reset Link</button>
        </div>
      </form>

      <div class="text-center mt-3">
        <Link href="/login" class="text-decoration-none">Back to Login</Link>
      </div>
    </div>
  </div>
  <Footer />
</template>

<style scoped>

</style>
