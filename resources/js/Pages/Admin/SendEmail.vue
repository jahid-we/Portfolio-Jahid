<script setup>
import { ref,  onMounted } from "vue";
import { Link, router } from '@inertiajs/vue3'
import AOS from "aos";

import { showSuccess, showError} from '../../Utils/VueToast.js';
import AdminHeader from '../../Components/Admin/AdminHeader.vue';
import Footer from '../../Components/Footer.vue';
import axios from "axios";

const email = ref('');

const sendResetLink =async () =>{
    if(!email.value){
        showError("Please enter email");
        return;
    }
    try{
        const response = await axios.post('/send-email', {email: email.value});
        if(response.status === 200){
            email.value = "";
            setTimeout(() => {
                router.visit("/login");
            }, 1000);
            showSuccess(response.data.data);
        }else{
            showError(response.data.data);
        }
    } catch (error) {
        if (error.response) {
            if (error.response.status === 422) {
                // ValidationException from backend
                const validationErrors = error.response.data.data
                for (let field in validationErrors) {
                    showError(validationErrors[field][0])
                }
            } else {
                // Any other error with a backend message
                showError(error.response.data.data || 'Unexpected error occurred.')
            }
        } else {
            // Network or unknown error
            showError('Network error. Please try again later.')
        }
    }
}

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

        <div class="mb-3">
          <label for="email" class="form-label">Email address</label>
          <input type="email" v-model="email" class="form-control" id="email" required />
        </div>

        <div class="d-grid">
          <button type="submit" @click.prevent="sendResetLink()" class="btn text-white shadow" style="background-color: #34b7a7;">Send Reset Link</button>
        </div>

      <div class="text-center mt-3">
        <Link href="/login" class="text-decoration-none">Back to Login</Link>
      </div>
    </div>
  </div>
  <Footer />
</template>

<style scoped>

</style>
