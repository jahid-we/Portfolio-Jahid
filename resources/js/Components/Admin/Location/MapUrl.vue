<script setup>
import { ref, onMounted } from "vue";
import AOS from "aos";
import axios from "axios";
import { showSuccess, showError } from "../../../Utils/VueToast.js";

const mapUrl = ref("");
const loading = ref(false);
const urlExists = ref(false);

// Fetch existing map URL
const getMapUrl = async () => {
  try {
    const response = await axios.get("/get-map-url");
    if (response.status === 200 && response.data.data?.map_url) {
      mapUrl.value = response.data.data.map_url;
      urlExists.value = true;
    } else {
      urlExists.value = false;
    }
  } catch (error) {
    showError("Failed to load map URL");
  }
};

// Create or update map URL
const saveMapUrl = async () => {
  loading.value = true;
  try {
    const response = await axios.post("/create-map-url", {
      map_url: mapUrl.value,
    });
    if (response.status === 200) {
      showSuccess("Map URL saved successfully");
      urlExists.value = true;
    }
  } catch (error) {
    showError("Failed to save map URL");
  } finally {
    loading.value = false;
  }
};

// Delete map URL
const deleteMapUrl = async () => {
  try {
    const response = await axios.delete("/delete-map-url");
    if (response.status === 200) {
      showSuccess("Map URL deleted");
      mapUrl.value = "";
      urlExists.value = false;
    }
  } catch (error) {
    showError("Failed to delete map URL");
  }
};

onMounted(() => {
  AOS.init();
  getMapUrl();
});
</script>

<template>
  <div class="container py-4">
    <h4 class="mb-3">Manage Map URL</h4>

    <div class="mb-3">
      <label for="mapUrlInput" class="form-label">Google Map Embed URL</label>
      <input
        type="text"
        id="mapUrlInput"
        v-model="mapUrl"
        class="form-control"
        placeholder="Enter Google Map embed URL"
      />
    </div>

    <div class="d-flex gap-2">
      <button class="btn btn-success" :disabled="loading" @click="saveMapUrl">
        {{ loading ? "Saving..." : urlExists ? "Update URL" : "Save URL" }}
      </button>

      <button
        class="btn btn-danger"
        v-if="urlExists"
        :disabled="loading"
        @click="deleteMapUrl"
      >
        Delete URL
      </button>
    </div>

    <div v-if="mapUrl" class="mt-4">
      <h6>Preview:</h6>
      <iframe
        :src="mapUrl"
        width="100%"
        height="300"
        style="border: 0"
        allowfullscreen=""
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"
      ></iframe>
    </div>
  </div>
</template>

<style scoped>
.container {
  max-width: 700px;
}
</style>
