<script setup>
import { onMounted } from "vue";
import AOS from "aos";
import HeaderPart from "../Components/HeaderPart.vue";
import Footer from "../Components/Footer.vue";

onMounted(() => {
    AOS.init();
    // ✅ Scroll Top Logic
    const scrollTopBtn = document.getElementById("scroll-top");

    // Show/hide scroll button
    window.addEventListener("scroll", () => {
        if (scrollTopBtn) {
            if (window.scrollY > 100) {
                scrollTopBtn.classList.add("active");
            } else {
                scrollTopBtn.classList.remove("active");
            }
        }
    });
});
</script>

<template>
    <div class="contact-page">
        <!-- Header Section -->
        <HeaderPart />
        <!-- Main Content -->
        <main class="main">
            <!-- Contact Section -->
            <section id="contact" class="contact section">
                <!-- Section Title -->
                <div class="container section-title" data-aos="fade-up">
                    <h2>Contact</h2>
                    <p>
                        Feel free to reach out if you have any questions,
                        project ideas, or just want to connect. I'm always open
                        to collaborations and feedback!
                    </p>
                </div>
                <!-- End Section Title -->

                <div class="container" data-aos="fade-up" data-aos-delay="100">
                    <div class="row gy-4">
                        <div class="col-lg-5">
                            <div class="info-wrap">
                                <div
                                    class="info-item d-flex"
                                    data-aos="fade-up"
                                    data-aos-delay="200"
                                >
                                    <i class="bi bi-geo-alt flex-shrink-0"></i>
                                    <div>
                                        <h3>Address</h3>
                                        <p>
                                         Brahmanbaria Sadar, Brahmanbaria, Bangladesh
                                        </p>
                                    </div>
                                </div>
                                <!-- End Info Item -->

                                <div
                                    class="info-item d-flex"
                                    data-aos="fade-up"
                                    data-aos-delay="300"
                                >
                                    <i
                                        class="bi bi-telephone flex-shrink-0"
                                    ></i>
                                    <div>
                                        <h3>Call Us</h3>
                                        <p>+8801959077170</p>
                                    </div>
                                </div>
                                <!-- End Info Item -->

                                <div
                                    class="info-item d-flex"
                                    data-aos="fade-up"
                                    data-aos-delay="400"
                                >
                                    <i class="bi bi-envelope flex-shrink-0"></i>
                                    <div>
                                        <h3>Email Us</h3>
                                        <p>jahidhasan370919@gmail.com</p>
                                    </div>
                                </div>
                                <!-- End Info Item -->

                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d631.6532505206847!2d91.10323676477381!3d23.979113423580397!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e1!3m2!1sen!2sbd!4v1752600929072!5m2!1sen!2sbd"
                                    frameborder="0"
                                    style="
                                        border: 0;
                                        width: 100%;
                                        height: 270px;
                                    "
                                    allowfullscreen=""
                                    loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"
                                ></iframe>
                            </div>
                        </div>

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
                                        <label for="name-field" class="pb-2"
                                            >Your Name</label
                                        >
                                        <input
                                            type="text"
                                            name="name"
                                            id="name-field"
                                            class="form-control"
                                            required=""
                                        />
                                    </div>

                                    <div class="col-md-6">
                                        <label for="email-field" class="pb-2"
                                            >Your Email</label
                                        >
                                        <input
                                            type="email"
                                            class="form-control"
                                            name="email"
                                            id="email-field"
                                            required=""
                                        />
                                    </div>

                                    <div class="col-md-12">
                                        <label for="subject-field" class="pb-2"
                                            >Subject</label
                                        >
                                        <input
                                            type="text"
                                            class="form-control"
                                            name="subject"
                                            id="subject-field"
                                            required=""
                                        />
                                    </div>

                                    <div class="col-md-12">
                                        <label for="message-field" class="pb-2"
                                            >Message</label
                                        >
                                        <textarea
                                            class="form-control"
                                            name="message"
                                            rows="10"
                                            id="message-field"
                                            required=""
                                        ></textarea>
                                    </div>

                                    <div class="col-md-12 text-center">
                                        <div class="loading">Loading</div>
                                        <div class="error-message"></div>
                                        <div class="sent-message">
                                            Your message has been sent. Thank
                                            you!
                                        </div>

                                        <button type="submit">
                                            Send Message
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- End Contact Form -->
                    </div>
                </div>
            </section>
            <!-- /Contact Section -->
        </main>
        <!-- Footer Section -->
        <Footer />
        <!-- Scroll Top & Preloader -->
        <a
            href="#"
            id="scroll-top"
            class="scroll-top d-flex align-items-center justify-content-center"
        >
            <i class="bi bi-arrow-up-short"></i>
        </a>
    </div>
</template>

<style scoped></style>
