<script setup>
import { ref, onMounted } from "vue";
import { showSuccess, showError } from "../Utils/VueToast.js";
import HeaderPart from "../Components/HeaderPart.vue";
import Footer from "../Components/Footer.vue";
import AOS from "aos";
import axios from "axios";

// Form fields
const name = ref("");
const email = ref("");
const subject = ref("");
const message = ref("");

// Contact info fields
const mapUrl = ref("");
const address = ref("");
const mobile = ref("");
const contactEmail = ref("");

// Rate limit
const clickCount = ref(0);
const isBlocked = ref(false);

// Send message
const sendEmail = async () => {
  if (isBlocked.value) {
    showError("You can only send 3 messages per minute.");
    return;
  }

  if (!name.value || !email.value || !subject.value || !message.value) {
    showError("Please fill all the fields");
    return;
  }

  clickCount.value++;
  if (clickCount.value === 3) {
    setTimeout(() => {
      clickCount.value = 0;
      isBlocked.value = false;
    }, 60000);
  }
  if (clickCount.value >= 3) {
    isBlocked.value = true;
  }

  try {
    const response = await axios.post("/create-message", {
      name: name.value,
      email: email.value,
      subject: subject.value,
      message: message.value,
    });

    if (response.status === 200) {
      name.value = "";
      email.value = "";
      subject.value = "";
      message.value = "";
      showSuccess(response.data.data);
    } else {
      showError(response.data.data);
    }
  } catch (error) {
    if (error.response?.status === 422) {
      const validationErrors = error.response.data.data;
      for (let field in validationErrors) {
        showError(validationErrors[field][0]);
      }
    } else {
      showError("Something went wrong. Please try again.");
    }
  }
};

// Load map URL
const getMapUrl = async () => {
  try {
    const response = await axios.get("/get-map-url");
    if (response.status === 200 && response.data.data?.map_url) {
      mapUrl.value = response.data.data.map_url;
    }
  } catch (error) {
    console.log("Error loading map URL");
  }
};

// Load address info
const getAddress = async () => {
  try {
    const response = await axios.get("/get-address");
    if (response.status === 200 && response.data.data) {
      address.value = response.data.data.address;
      mobile.value = response.data.data.mobile;
      contactEmail.value = response.data.data.email;
    }
  } catch (error) {
    showError("Failed to load contact info");
  }
};

// Init
onMounted(() => {
  AOS.init();
  getMapUrl();
  getAddress();

  const scrollTopBtn = document.getElementById("scroll-top");
  window.addEventListener("scroll", () => {
    if (scrollTopBtn) {
      scrollTopBtn.classList.toggle("active", window.scrollY > 100);
    }
  });
});
</script>

<template>
  <div class="contact-page">
    <HeaderPart />

    <main class="main">
      <section id="contact" class="contact section">
        <div class="container section-title" data-aos="fade-up">
          <h2>Contact</h2>
          <p>
            Feel free to reach out if you have any questions, project ideas, or just want
            to connect. I'm always open to collaborations and feedback!
          </p>
        </div>

        <div class="container" data-aos="fade-up" data-aos-delay="100">
          <div class="row gy-4">
            <!-- Left Side: Contact Info -->
            <div class="col-lg-5">
              <div class="info-wrap">
                <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                  <i class="bi bi-geo-alt flex-shrink-0"></i>
                  <div>
                    <h3>Address</h3>
                    <p>{{ address }}</p>
                  </div>
                </div>

                <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                  <i class="bi bi-telephone flex-shrink-0"></i>
                  <div>
                    <h3>Call Us</h3>
                    <p>{{ mobile }}</p>
                  </div>
                </div>

                <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                  <i class="bi bi-envelope flex-shrink-0"></i>
                  <div>
                    <h3>Email Us</h3>
                    <p>{{ contactEmail }}</p>
                  </div>
                </div>

                <iframe
                  v-if="mapUrl"
                  :src="mapUrl"
                  width="100%"
                  height="300"
                  frameborder="0"
                  style="border: 0; width: 100%; height: 270px"
                  allowfullscreen=""
                  loading="lazy"
                  referrerpolicy="no-referrer-when-downgrade"
                ></iframe>
              </div>
            </div>

            <!-- Right Side: Contact Form -->
            <div class="col-lg-7">
              <form
                action="#"
                method="post"
                class="php-email-form"
                data-aos="fade-up"
                data-aos-delay="200"
              >
                <div class="row gy-4">
                  <div class="col-md-6">
                    <label for="name-field" class="pb-2">Your Name</label>
                    <input
                      v-model="name"
                      type="text"
                      id="name-field"
                      class="form-control"
                      required
                    />
                  </div>

                  <div class="col-md-6">
                    <label for="email-field" class="pb-2">Your Email</label>
                    <input
                      v-model="email"
                      type="email"
                      id="email-field"
                      class="form-control"
                      required
                    />
                  </div>

                  <div class="col-md-12">
                    <label for="subject-field" class="pb-2">Subject</label>
                    <input
                      v-model="subject"
                      type="text"
                      id="subject-field"
                      class="form-control"
                      required
                    />
                  </div>

                  <div class="col-md-12">
                    <label for="message-field" class="pb-2">Message</label>
                    <textarea
                      v-model="message"
                      id="message-field"
                      class="form-control"
                      rows="10"
                      required
                    ></textarea>
                  </div>

                  <div class="col-md-12 text-center">
                    <button
                      @click.prevent="sendEmail"
                      type="submit"
                      :disabled="isBlocked"
                    >
                      {{ isBlocked ? "Please wait..." : "Send Message" }}
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
    </main>

    <Footer />

    <a
      href="#"
      id="scroll-top"
      class="scroll-top d-flex align-items-center justify-content-center"
    >
      <i class="bi bi-arrow-up-short"></i>
    </a>
  </div>
</template>

<style scoped>
.contact-page {
  background: #fff;
}
</style>
