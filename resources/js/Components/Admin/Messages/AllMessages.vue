<script setup>
import { ref, onMounted } from "vue";

import AOS from "aos";
import axios from "axios";
import { showSuccess, showError } from "../../../Utils/VueToast.js";
import DeleteModal from "./DeleteModal.vue";
import DeleteAllModal from "./DeleteAllModal.vue";

const messages = ref([]);
const messageId = ref(null);
const deleteModalVisible = ref(false);
const deleteAllModalVisible = ref(false);

const handleDelete = (id) => {
  if (!id) return;
  messageId.value = id;
  deleteModalVisible.value = true;
};

const handleDeleteAll = () => {
  deleteAllModalVisible.value = true;
};

const loadAllMessages = async () => {
  try {
    const Response = await axios.get("/get-all-messages");
    if (Response.status === 200) {
      messages.value = Response.data.data;
    } else {
      console.log("Unable To Load Data");
    }
  } catch (error) {
    console.log("Unable To Load Data");
  }
};

onMounted(() => {
  AOS.init();
  loadAllMessages();
});
</script>

<template>
  <button
    @click="handleDeleteAll()"
    class="btn btn-sm btn-danger mb-2 shadow"
    data-aos="fade-up"
  >
    Delete All Messages
  </button>
  <table class="table table-hover" data-aos="fade-up">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Subject</th>
        <th scope="col">Messages</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="(item, index) in messages" :key="item.id">
        <th scope="row">{{ index + 1 }}</th>
        <td>{{ item.name }}</td>
        <td>{{ item.email }}</td>
        <td>{{ item.subject }}</td>
        <td>{{ item.message }}</td>
        <td>
          <!-- Example action button (optional) -->
          <button @click="handleDelete(item.id)" class="btn btn-sm btn-danger">
            Delete
          </button>
        </td>
      </tr>
    </tbody>
  </table>

  <DeleteModal
    :visible="deleteModalVisible"
    :messageId="messageId"
    @cancel="deleteModalVisible = false"
    @deleted="
      () => {
        deleteModalVisible = false;
        loadAllMessages();
      }
    "
  />

  <DeleteAllModal
    :visible="deleteAllModalVisible"
    @cancel="deleteAllModalVisible = false"
    @deleted="
      () => {
        deleteAllModalVisible = false;
        loadAllMessages();
      }
    "
  />
</template>

<style scoped></style>
