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
    <div class="about-page">
        <!-- Header Section -->
        <HeaderPart />
        <main class="main">
            <!-- About Section -->
            <section id="about" class="about section">
                <div class="container section-title" data-aos="fade-up">
                    <h2>About Me</h2>
                    <p>
                        Motivated and detail-oriented web developer with a strong foundation in Laravel, Vue.js, and database management. Passionate about building scalable and secure applications, optimizing performance, and writing clean, efficient code. Always eager to explore new technologies and improve development processes using AI tools like ChatGPT and Google Gemini.
                    </p>
                </div>
                <!-- End Section Title -->

                <div class="container" data-aos="fade-up" data-aos-delay="100">
                    <div class="row gy-4 justify-content-center">
                        <div class="col-lg-4">
                            <img
                                :src="'assets/img/profile-img.jpg'"
                                class="img-fluid"
                                alt="Jahid Hasan"
                            />
                        </div>
                        <div class="col-lg-8 content">
                            <h2>Jahid Hasan</h2>
                            <p class="fst-italic py-3">
                                Web Developer | Laravel & Vue.js Enthusiast | Tech Lover
                            </p>
                            <div class="row">
                                <div class="col-lg-6">
                                    <ul>
                                        <li>
                                            <i class="bi bi-chevron-right"></i>
                                            <strong>Birthday:</strong>
                                            <span>3 November 2003</span>
                                        </li>
                                        <li>
                                            <i class="bi bi-chevron-right"></i>
                                            <strong>Website:</strong>
                                            <span>www.example.com</span>
                                        </li>
                                        <li>
                                            <i class="bi bi-chevron-right"></i>
                                            <strong>Phone:</strong>
                                            <span>+8801701367333</span>
                                        </li>
                                        <li>
                                            <i class="bi bi-chevron-right"></i>
                                            <strong>City:</strong>
                                            <span>Bangladesh</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-6">
                                    <ul>
                                        <li>
                                            <i class="bi bi-chevron-right"></i>
                                            <strong>Age:</strong>
                                            <span>22</span>
                                        </li>
                                        <li>
                                            <i class="bi bi-chevron-right"></i>
                                            <strong>Degree:</strong>
                                            <span>BA</span>
                                        </li>
                                        <li>
                                            <i class="bi bi-chevron-right"></i>
                                            <strong>Email:</strong>
                                            <span>jahidhasan370919@gmail.com</span>
                                        </li>
                                        <li>
                                            <i class="bi bi-chevron-right"></i>
                                            <strong>Freelance:</strong>
                                            <span>Available</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <p class="py-3">
                                I am passionate about building clean and high-performing web applications. With hands-on experience in building various projects, such as time trackers, e-commerce apps, and inventory management systems, I continuously aim to enhance my skills and deliver optimal solutions.
                            </p>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /About Section -->

            <!-- Skills Section -->
            <section id="skills" class="skills section">
                <div class="container section-title" data-aos="fade-up">
                    <h2>Skills</h2>
                    <p>
                        Necessitatibus eius consequatur ex aliquid fuga eum
                        quidem sint consectetur velit
                    </p>
                </div>

                <div class="container" data-aos="fade-up" data-aos-delay="100">
                    <div class="row skills-content skills-animation">
                        <div class="col-lg-6">
                            <div class="progress">
                                <span class="skill"><span>HTML</span><i class="val">100%</i></span>
                                <div class="progress-bar-wrap">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>

                            <div class="progress">
                                <span class="skill"><span>CSS</span><i class="val">90%</i></span>
                                <div class="progress-bar-wrap">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>

                            <div class="progress">
                                <span class="skill"><span>JavaScript</span><i class="val">75%</i></span>
                                <div class="progress-bar-wrap">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="progress">
                                <span class="skill"><span>PHP</span><i class="val">80%</i></span>
                                <div class="progress-bar-wrap">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>

                            <div class="progress">
                                <span class="skill"><span>WordPress/CMS</span><i class="val">90%</i></span>
                                <div class="progress-bar-wrap">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>

                            <div class="progress">
                                <span class="skill"><span>Photoshop</span><i class="val">55%</i></span>
                                <div class="progress-bar-wrap">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Stats Section -->
            <section id="stats" class="stats section">
                <div class="container section-title" data-aos="fade-up">
                    <h2>Facts</h2>
                    <p>
                        Necessitatibus eius consequatur ex aliquid fuga eum
                        quidem sint consectetur velit
                    </p>
                </div>

                <div class="container" data-aos="fade-up" data-aos-delay="100">
                    <div class="row gy-4">
                        <div class="col-lg-3 col-md-6">
                            <div class="stats-item text-center w-100 h-100">
                                <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
                                <p>Clients</p>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="stats-item text-center w-100 h-100">
                                <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></span>
                                <p>Projects</p>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="stats-item text-center w-100 h-100">
                                <span data-purecounter-start="0" data-purecounter-end="1453" data-purecounter-duration="1" class="purecounter"></span>
                                <p>Hours Of Support</p>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="stats-item text-center w-100 h-100">
                                <span data-purecounter-start="0" data-purecounter-end="32" data-purecounter-duration="1" class="purecounter"></span>
                                <p>Workers</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <!-- Footer Section -->
        <Footer />

        <!-- Scroll Top & Preloader -->
        <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center">
            <i class="bi bi-arrow-up-short"></i>
        </a>
    </div>
</template>

<style scoped></style>
