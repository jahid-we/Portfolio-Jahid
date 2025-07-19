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
  <div class="d-flex flex-column min-vh-100">

    <AdminHeader />
    <!-- Main Content -->
    <div class="container d-flex justify-content-center align-items-center flex-grow-1 py-5">
      <div class="col-md-6">
        <!-- Card -->
        <div class="card shadow w-100">
          <div class="card-header text-white" style="background-color: #34b7a7;">
            <strong>Reset Password</strong>
          </div>

          <div class="card-body">
            <div class="mb-3">
              <input type="text" v-model="token" hidden />

              <label class="form-label">New Password</label>
              <input
                type="password"

                class="form-control mb-3"
                placeholder="New Password"
              />

              <label class="form-label">Confirm Password</label>
              <input
                type="password"

                class="form-control mb-4"
                placeholder="Confirm Password"
              />
            </div>

            <!-- Submit Button -->
            <button
              
              class="btn text-white w-100"
              style="background-color: #34b7a7;"
            >
              Update Password
            </button>

            <!-- Login Link -->
            <div class="text-center mt-4 mb-3">
              Remembered your password?
              <Link href="/login">Login</Link>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Footer -->
    <Footer />
  </div>
</template>


<style scoped>

</style>
