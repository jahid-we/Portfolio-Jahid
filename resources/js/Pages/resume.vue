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
    <div class="resume-page">
        <HeaderPart />

        <main class="main">
            <section id="resume" class="resume section">
                <div class="container section-title" data-aos="fade-up">
                    <h2>Resume</h2>
                    <p>
                        Motivated and detail-oriented web developer seeking a
                        role where I can apply my skills in Laravel, Vue.js, and
                        database management to build scalable and secure
                        applications.
                    </p>
                </div>

                <div class="container">
                    <div class="row">
                        <!-- Left Column -->
                        <div
                            class="col-lg-6"
                            data-aos="fade-up"

                        >
                            <h3 class="resume-title" data-aos="fade-up">Profile</h3>
                            <div class="resume-item pb-0" data-aos="fade-up">
                                <h4>Jahid Hasan</h4>
                                <ul>
                                    <li>📱 +8801701367333</li>
                                    <li>📧 jahidhasan370919@gmail.com</li>
                                    <li>
                                        🔗
                                        <a
                                            href="https://linkedin.com/in/jahid-hasan-993597307"
                                            target="_blank"
                                            >LinkedIn</a
                                        >
                                    </li>
                                    <li>
                                        💻
                                        <a
                                            href="https://github.com/jahid-we"
                                            target="_blank"
                                            >GitHub</a
                                        >
                                    </li>
                                </ul>
                            </div>

                            <h3 class="resume-title">Education</h3>
                            <div class="resume-item" data-aos="fade-up">
                                <h4>Bachelor of Arts (History)</h4>
                                <h5>2022–2023</h5>
                                <p><em>National University</em></p>
                            </div>
                            <div class="resume-item" data-aos="fade-up">
                                <h4>HSC – Humanities</h4>
                                <h5>2022</h5>
                                <p>
                                    <em
                                        >Bangladesh Gas Fields School &
                                        College</em
                                    >
                                </p>
                            </div>
                            <div class="resume-item" data-aos="fade-up">
                                <h4>SSC – Humanities</h4>
                                <h5>2020</h5>
                                <p><em>Brahmanbaria High School</em></p>
                            </div>

                            <h3 class="resume-title" data-aos="fade-up">Training</h3>
                            <div class="resume-item" data-aos="fade-up">
                                <h4>PHP & Laravel Web Development</h4>
                                <h5>March 2024 – August 2024</h5>
                                <p><em>Ostad</em></p>
                                <p>
                                    Covered Laravel fundamentals, REST API
                                    development, and MVC structure with hands-on
                                    projects.
                                </p>
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div
                            class="col-lg-6"
                            data-aos="fade-up"
                            data-aos-delay="200"
                        >
                            <h3 class="resume-title">Project Experience</h3>
                            <div class="resume-item" data-aos="fade-up">
                                <h4>Freelance Time Tracker</h4>
                                <p>
                                    Web-based time tracking solution for
                                    freelancers. Built with Laravel, Inertia.js,
                                    Vue.js, MySQL.
                                </p>
                                <a
                                    href="https://github.com/jahid-we/Freelance-Time-Tracker-Software-.git"
                                    target="_blank"
                                    >View on GitHub</a
                                >
                            </div>
                            <div class="resume-item" data-aos="fade-up">
                                <h4>Smart Contact Manager</h4>
                                <p>
                                    CRUD app for managing contacts. Built with
                                    Laravel, Inertia.js, Vue.js.
                                </p>
                                <a
                                    href="https://github.com/jahid-we/Smart-Contact.git"
                                    target="_blank"
                                    >View on GitHub</a
                                >
                            </div>
                            <div class="resume-item" data-aos="fade-up">
                                <h4>Simple E-Commerce App</h4>
                                <p>
                                    Basic shopping platform with cart
                                    functionality. Built with Laravel,
                                    Inertia.js, Vue.js, Bootstrap.
                                </p>
                                <a
                                    href="https://github.com/jahid-we/Simple-E-commerce-Project.git"
                                    target="_blank"
                                    >View on GitHub</a
                                >
                            </div>
                            <div class="resume-item" data-aos="fade-up">
                                <h4>Inventory Management System</h4>
                                <p>
                                    Inventory tracking system built with Laravel
                                    and Blade.
                                </p>
                                <a
                                    href="https://github.com/jahid-we/Inventory-Management-.git"
                                    target="_blank"
                                    >View on GitHub</a
                                >
                            </div>

                            <h3 class="resume-title" data-aos="fade-up">Technical Skills</h3>
                            <div class="resume-item" data-aos="fade-up">
                                <ul>
                                    <li>
                                        <strong>Languages:</strong> PHP,
                                        JavaScript (basic)
                                    </li>
                                    <li>
                                        <strong>Frameworks:</strong> Laravel,
                                        Vue.js, Inertia.js
                                    </li>
                                    <li>
                                        <strong>Front-End:</strong> HTML, CSS,
                                        Bootstrap
                                    </li>
                                    <li><strong>Database:</strong> MySQL</li>
                                    <li>
                                        <strong>Version Control:</strong> Git,
                                        GitHub
                                    </li>
                                    <li>
                                        <strong>AI Tools:</strong> ChatGPT,
                                        Google Gemini
                                    </li>
                                    <li>
                                        <strong>Others:</strong> Adobe Photoshop
                                        (basic), MS Office
                                    </li>
                                </ul>
                            </div>

                            <h3 class="resume-title" data-aos="fade-up" >Languages</h3>
                            <div class="resume-item" data-aos="fade-up" >
                                <ul>
                                    <li>Bangla: Native</li>
                                    <li>
                                        English: Intermediate (strong
                                        reading/writing)
                                    </li>
                                    <li>Hindi: Conversational</li>
                                </ul>
                            </div>

                            <h3 class="resume-title" data-aos="fade-up" data-aos-delay="200">Reference</h3>
                            <div class="resume-item" data-aos="fade-up" data-aos-delay="200">
                                <p>
                                    <strong>Rabbil Hasan</strong><br />
                                    Software Engineering Manager, IDLC Finance
                                    Limited<br />
                                    📞 +8801785388919
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <!-- Footer  -->
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
