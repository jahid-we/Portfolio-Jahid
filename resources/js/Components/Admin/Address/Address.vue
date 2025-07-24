<script setup>
import { ref, onMounted } from "vue";
import AOS from "aos";
import axios from "axios";
import { showSuccess, showError } from "../../../Utils/VueToast.js";

const address = ref("");
const mobile = ref("");
const email = ref("");

const loading = ref(false);
const addressExists = ref(false);

// Fetch existing address
const getAddress = async () => {
  try {
    const response = await axios.get("/get-address");
    if (response.status === 200 && response.data.data) {
      const data = response.data.data;
      address.value = data.address;
      mobile.value = data.mobile;
      email.value = data.email;
      addressExists.value = true;
    } else {
      addressExists.value = false;
    }
  } catch (error) {
    showError("Failed to load address");
  }
};

// Create or update address
const saveAddress = async () => {
  loading.value = true;
  try {
    const response = await axios.post("/create-address", {
      address: address.value,
      mobile: mobile.value,
      email: email.value,
    });
    if (response.status === 200) {
      showSuccess("Address saved successfully");
      addressExists.value = true;
    }
  } catch (error) {
    showError("Failed to save address");
  } finally {
    loading.value = false;
  }
};

// Delete address
const deleteAddress = async () => {
  try {
    const response = await axios.delete("/delete-address");
    if (response.status === 200) {
      showSuccess("Address deleted");
      address.value = "";
      mobile.value = "";
      email.value = "";
      addressExists.value = false;
    }
  } catch (error) {
    showError("Failed to delete address");
  }
};

onMounted(() => {
  AOS.init();
  getAddress();
});
</script>

<template>
  <div class="container py-4">
    <h4 class="mb-3">Manage Address</h4>

    <div class="mb-3">
      <label class="form-label">Address</label>
      <input
        type="text"
        v-model="address"
        class="form-control"
        placeholder="Enter address"
      />
    </div>

    <div class="mb-3">
      <label class="form-label">Mobile</label>
      <input
        type="text"
        v-model="mobile"
        class="form-control"
        placeholder="Enter mobile number"
      />
    </div>

    <div class="mb-3">
      <label class="form-label">Email</label>
      <input
        type="email"
        v-model="email"
        class="form-control"
        placeholder="Enter email address"
      />
    </div>

    <div class="d-flex gap-2">
      <button class="btn btn-success" :disabled="loading" @click="saveAddress">
        {{ loading ? "Saving..." : addressExists ? "Update Address" : "Save Address" }}
      </button>

      <button
        class="btn btn-danger"
        v-if="addressExists"
        :disabled="loading"
        @click="deleteAddress"
      >
        Delete Address
      </button>
    </div>

    <div v-if="addressExists" class="mt-4">
      <h6>Preview:</h6>
      <p><strong>Address:</strong> {{ address }}</p>
      <p><strong>Mobile:</strong> {{ mobile }}</p>
      <p><strong>Email:</strong> {{ email }}</p>
    </div>
  </div>
</template>

<style scoped>
.container {
  max-width: 700px;
}
</style>
