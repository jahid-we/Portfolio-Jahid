<script setup>
import { ref, onMounted } from "vue";
import { Link } from "@inertiajs/vue3";

import AOS from "aos";
import axios from "axios";
import { showSuccess, showError } from "../../Utils/VueToast.js";
import AdminHeader from "../../Components/Admin/AdminHeader.vue";
import Footer from "../../Components/Footer.vue";

const props = defineProps({
    token: String,
    appUrl: String,
});

const token = ref(props.token);
const appUrl = ref(props.appUrl);

const newPassword = ref("");
const confirmPassword = ref("");

const updatePassword = async () => {
    if (!newPassword.value || !confirmPassword.value) {
        showError("Please enter new password and confirm password");
        return;
    }
    if (newPassword.value !== confirmPassword.value) {
        showError("Password does not match");
        return;
    }
    const data = {
        token: token.value,
        password: newPassword.value,
        password_confirmation: confirmPassword.value,
    };
    try {
        const response = await axios.post("/reset-password", data);
        if (response.status === 200) {
            newPassword.value = "";
            confirmPassword.value = "";
            token.value = "";
            setTimeout(() => {
                window.location.href = `${appUrl.value}/login`;
            }, 1000);
            showSuccess(response.data.data);
        } else {
            showError(response.data.data);
        }
    } catch (error) {
        if (error.response) {
            if (error.response.status === 422) {
                // ValidationException from backend
                const validationErrors = error.response.data.data;
                for (let field in validationErrors) {
                    showError(validationErrors[field][0]);
                }
            } else {
                // Any other error with a backend message
                showError(
                    error.response.data.data || "Unexpected error occurred."
                );
            }
        } else {
            // Network or unknown error
            showError("Network error. Please try again later.");
        }
    }
};

onMounted(() => {
    AOS.init();
});
</script>

<template>
    <div class="d-flex flex-column min-vh-100">
        <AdminHeader />
        <!-- Main Content -->
        <div
            class="container d-flex justify-content-center align-items-center flex-grow-1 py-5"
            data-aos="zoom-in"
        >
            <div class="col-md-6">
                <!-- Card -->
                <div class="card shadow w-100">
                    <div
                        class="card-header text-white"
                        style="background-color: #34b7a7"
                    >
                        <strong>Reset Password</strong>
                    </div>

                    <div class="card-body">
                        <div class="mb-3">
                            <input type="text" v-model="token" hidden />

                            <label class="form-label">New Password</label>
                            <input
                                type="password"
                                v-model="newPassword"
                                class="form-control mb-3"
                                placeholder="New Password"
                            />

                            <label class="form-label">Confirm Password</label>
                            <input
                                type="password"
                                v-model="confirmPassword"
                                class="form-control mb-4"
                                placeholder="Confirm Password"
                            />
                        </div>

                        <!-- Submit Button -->
                        <button
                            @click.prevent="updatePassword()"
                            type="submit"
                            class="btn text-white w-100"
                            style="background-color: #34b7a7"
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

<style scoped></style>
