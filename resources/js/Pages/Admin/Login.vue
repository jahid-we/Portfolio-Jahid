<script setup>
import { ref , onMounted } from "vue";
import { Link, router } from '@inertiajs/vue3'

import AOS from "aos";
import { showSuccess, showError} from '../../Utils/VueToast.js';
import AdminHeader from '../../Components/Admin/AdminHeader.vue';
import Footer from '../../Components/Footer.vue';
import axios from "axios";

onMounted(() => {
    AOS.init();
})

const email = ref('');
const password = ref('');
const rememberMe = ref(false);

const handleLogin = async () =>{
    if(!email.value || !password.value){
        showError("Please enter email and password");
        return;
    }
    const data = {
        email: email.value,
        password: password.value,
        remember: rememberMe.value
    }
    try{
        const response = await axios.post('/login', data);
        if(response.status === 200){
            email.value = "";
            password.value = "";
            setTimeout(() => {
                router.visit("/");
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





</script>

<template>
<AdminHeader />
<div class="d-flex justify-content-center align-items-center vh-100" data-aos="zoom-in">
    <div class="card p-4 shadow-sm" style="width: 100%; max-width: 400px;">
      <h4 class="text-center mb-4"> Admin Login</h4>

      <form>
        <div class="mb-3">
          <label for="email" class="form-label">Email address</label>
          <input type="email" v-model="email" class="form-control" id="email" required />
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" v-model="password" class="form-control" id="password" required />
        </div>

        <div class="mb-3 d-flex justify-content-between align-items-center">
          <div class="form-check">
            <input class="form-check-input" v-model="rememberMe" type="checkbox" id="rememberMe" />
            <label class="form-check-label" for="rememberMe">Remember me</label>
          </div>
          <Link href="/send-email" class="text-decoration-none">Forgot password?</Link>
        </div>

        <div class="d-grid">
          <button type="submit" @click.prevent="handleLogin()" class="btn text-white shadow" style="background-color: #34b7a7;">Login</button>
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
