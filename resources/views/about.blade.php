<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Cobblepot - Health Management System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #6b8cff 0%, #4b6cb7 100%);
        }
        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        .team-member:hover img {
            transform: scale(1.05);
        }
        .wave-shape {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            overflow: hidden;
            line-height: 0;
        }
        .wave-shape svg {
            position: relative;
            display: block;
            width: calc(100% + 1.3px);
            height: 150px;
        }
        .wave-shape .shape-fill {
            fill: #FFFFFF;
        }
    </style>
</head>
<body class="font-sans antialiased text-gray-800">
    <!-- Navigation -->
    <nav class="bg-white shadow-sm w-full z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0 flex items-center">
                        <i class="fas fa-clinic-medical text-indigo-600 text-2xl mr-2"></i>
                        <span class="text-xl font-bold text-indigo-600">Cobblepot</span>
                    </div>
                </div>
                <div class="flex items-center space-x-8">
                    <a href="{{ url('/') }}" class="nav-link px-3 py-2 text-sm font-medium text-gray-900 hover:text-indigo-600 transition">Home</a>
                    <a href="{{ url('/about') }}" class="nav-link px-3 py-2 text-sm font-medium text-gray-500 hover:text-indigo-600 transition">About</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="relative gradient-bg text-white">
        <div class="max-w-7xl mx-auto py-24 px-4 sm:py-32 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl font-extrabold tracking-tight sm:text-5xl lg:text-6xl">
                    About Cobblepot
                </h1>
               
            </div>
        </div>
        <div class="relative wave-shape">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
            </svg>
        </div>
    </div>

    <!-- Our Story -->
    <div class="py-16 bg-white overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:grid lg:grid-cols-2 lg:gap-8">
                <div class="mt-12 lg:mt-0">
                    <div class="relative">
                        <div class="relative rounded-lg shadow-lg overflow-hidden">
                            <img class="w-full h-auto" src="https://images.unsplash.com/photo-1579684385127-1ef15d508118?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" alt="Healthcare professionals discussing">
                            <div class="absolute inset-0 bg-blue-600 opacity-25"></div>
                        </div>
                        <div class="absolute -bottom-6 -right-6 w-32 h-32 bg-blue-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-heartbeat text-blue-600 text-4xl"></i>
                        </div>
                    </div>
                </div>
                <div class="relative">
                    <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                        Our Story
                    </h2>
                    <p class="mt-6 text-lg text-gray-500">
                        Founded in 2018, Cobblepot began as a small team of healthcare professionals and technologists who saw the need for a more integrated approach to health management. We were frustrated by the fragmented systems that made patient care more difficult than it needed to be.
                    </p>
                    <p class="mt-4 text-lg text-gray-500">
                        Today, we've grown into a leading health management platform serving over 500 healthcare providers and improving outcomes for thousands of patients. Our mission remains the same: to simplify healthcare management so providers can focus on what matters most - patient care.
                    </p>
                    <div class="mt-8">
                        <div class="inline-flex rounded-md shadow">
                            <a href="#" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                                Learn more about our journey
                                <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Our Mission -->
    <div class="py-16 bg-gray-50 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:grid lg:grid-cols-2 lg:gap-8">
                <div class="relative">
                    <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                        Our Mission
                    </h2>
                    <p class="mt-6 text-lg text-gray-500">
                        At Cobblepot, we believe that better health management leads to better health outcomes. Our platform is designed to bridge the gap between patients and providers, creating a seamless experience for both.
                    </p>
                    <div class="mt-8">
                        <div class="flex items-start">
                            <div class="flex-shrink-0 bg-blue-500 rounded-md p-2">
                                <i class="fas fa-users text-white"></i>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-medium text-gray-900">Patient-Centered</h3>
                                <p class="mt-1 text-gray-500">
                                    Everything we do is designed with the patient experience in mind, from intuitive interfaces to personalized care plans.
                                </p>
                            </div>
                        </div>
                        <div class="mt-6 flex items-start">
                            <div class="flex-shrink-0 bg-blue-500 rounded-md p-2">
                                <i class="fas fa-shield-alt text-white"></i>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-medium text-gray-900">Secure & Compliant</h3>
                                <p class="mt-1 text-gray-500">
                                    We maintain the highest standards of security and compliance, ensuring your data is always protected.
                                </p>
                            </div>
                        </div>
                        <div class="mt-6 flex items-start">
                            <div class="flex-shrink-0 bg-blue-500 rounded-md p-2">
                                <i class="fas fa-lightbulb text-white"></i>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-medium text-gray-900">Innovative</h3>
                                <p class="mt-1 text-gray-500">
                                    We're constantly evolving our platform with the latest technologies to meet the changing needs of healthcare.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-12 lg:mt-0">
                    <div class="relative">
                        <div class="relative rounded-lg shadow-lg overflow-hidden">
                            <img class="w-full h-auto" src="https://images.unsplash.com/photo-1576091160550-2173dba999ef?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" alt="Doctor using digital tablet">
                            <div class="absolute inset-0 bg-blue-600 opacity-25"></div>
                        </div>
                        <div class="absolute -bottom-6 -left-6 w-32 h-32 bg-blue-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-bullseye text-blue-600 text-4xl"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Features -->
    <div class="py-16 bg-white overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                    Why Choose Cobblepot?
                </h2>
                <p class="mt-4 max-w-2xl text-xl text-gray-500 mx-auto">
                    Our platform offers comprehensive solutions designed to streamline healthcare management.
                </p>
            </div>
            <div class="mt-16 grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                <div class="feature-card bg-white p-8 rounded-lg shadow-md border border-gray-100 transition duration-300 ease-in-out">
                    <div class="flex items-center justify-center h-12 w-12 rounded-md bg-blue-500 text-white">
                        <i class="fas fa-chart-line text-xl"></i>
                    </div>
                    <h3 class="mt-6 text-lg font-medium text-gray-900">Real-time Analytics</h3>
                    <p class="mt-2 text-gray-500">
                        Get actionable insights with our powerful analytics dashboard that tracks patient outcomes, operational efficiency, and financial performance.
                    </p>
                </div>
                <div class="feature-card bg-white p-8 rounded-lg shadow-md border border-gray-100 transition duration-300 ease-in-out">
                    <div class="flex items-center justify-center h-12 w-12 rounded-md bg-blue-500 text-white">
                        <i class="fas fa-calendar-check text-xl"></i>
                    </div>
                    <h3 class="mt-6 text-lg font-medium text-gray-900">Appointment Management</h3>
                    <p class="mt-2 text-gray-500">
                        Simplify scheduling with our intelligent system that reduces no-shows and optimizes provider schedules.
                    </p>
                </div>
                <div class="feature-card bg-white p-8 rounded-lg shadow-md border border-gray-100 transition duration-300 ease-in-out">
                    <div class="flex items-center justify-center h-12 w-12 rounded-md bg-blue-500 text-white">
                        <i class="fas fa-file-medical text-xl"></i>
                    </div>
                    <h3 class="mt-6 text-lg font-medium text-gray-900">Electronic Health Records</h3>
                    <p class="mt-2 text-gray-500">
                        Our fully integrated EHR system ensures all patient data is accessible, up-to-date, and secure.
                    </p>
                </div>
                <div class="feature-card bg-white p-8 rounded-lg shadow-md border border-gray-100 transition duration-300 ease-in-out">
                    <div class="flex items-center justify-center h-12 w-12 rounded-md bg-blue-500 text-white">
                        <i class="fas fa-comments text-xl"></i>
                    </div>
                    <h3 class="mt-6 text-lg font-medium text-gray-900">Patient Communication</h3>
                    <p class="mt-2 text-gray-500">
                        Engage patients with automated reminders, secure messaging, and telehealth capabilities.
                    </p>
                </div>
                <div class="feature-card bg-white p-8 rounded-lg shadow-md border border-gray-100 transition duration-300 ease-in-out">
                    <div class="flex items-center justify-center h-12 w-12 rounded-md bg-blue-500 text-white">
                        <i class="fas fa-prescription-bottle-alt text-xl"></i>
                    </div>
                    <h3 class="mt-6 text-lg font-medium text-gray-900">Medication Management</h3>
                    <p class="mt-2 text-gray-500">
                        Reduce medication errors with our integrated system that tracks prescriptions, allergies, and interactions.
                    </p>
                </div>
                <div class="feature-card bg-white p-8 rounded-lg shadow-md border border-gray-100 transition duration-300 ease-in-out">
                    <div class="flex items-center justify-center h-12 w-12 rounded-md bg-blue-500 text-white">
                        <i class="fas fa-mobile-alt text-xl"></i>
                    </div>
                    <h3 class="mt-6 text-lg font-medium text-gray-900">Mobile Access</h3>
                    <p class="mt-2 text-gray-500">
                        Providers and patients can access key features on-the-go with our fully responsive mobile interface.
                    </p>
                </div>
            </div>
        </div>
    </div>

            
    <!-- Testimonials -->
    <div class="py-16 bg-white overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                    What Our Clients Say
                </h2>
                <p class="mt-4 max-w-2xl text-xl text-gray-500 mx-auto">
                    Hear from healthcare providers who trust Cobblepot.
                </p>
            </div>
            <div class="mt-16 grid gap-8 md:grid-cols-2">
                <div class="bg-gray-50 p-8 rounded-lg shadow-sm">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                           
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-medium text-gray-900">Dr. James</h3>
                            <p class="text-blue-600">Family Practice,</p>
                        </div>
                    </div>
                    <p class="mt-4 text-gray-600">
                        <i class="fas fa-quote-left text-gray-300 mr-2"></i>
                        Cobblepot has transformed our practice. We've reduced administrative time by 40% and improved patient satisfaction scores significantly. The intuitive interface makes it easy for our entire team to adopt.
                        <i class="fas fa-quote-right text-gray-300 ml-2"></i>
                    </p>
                    <div class="mt-4 flex">
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                    </div>
                </div>
                <div class="bg-gray-50 p-8 rounded-lg shadow-sm">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-medium text-gray-900">Natalie</h3>
                            <p class="text-blue-600">Clinic Administrator</p>
                        </div>
                    </div>
                    <p class="mt-4 text-gray-600">
                        <i class="fas fa-quote-left text-gray-300 mr-2"></i>
                        The transition to Cobblepot was seamless with their excellent onboarding team. We now have real-time visibility into our operations and can make data-driven decisions. Their customer support is responsive and knowledgeable.
                        <i class="fas fa-quote-right text-gray-300 ml-2"></i>
                    </p>
                    <div class="mt-4 flex">
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star-half-alt text-yellow-400"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="relative gradient-bg text-white">
        <div class="max-w-7xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-extrabold sm:text-4xl">
                Ready to transform your healthcare management?
            </h2>
            <p class="mt-6 max-w-3xl mx-auto text-xl">
                Join hundreds of healthcare providers who trust Cobblepot to streamline their operations and improve patient care.
            </p>
        
        </div>
        <div class="relative wave-shape">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
            </svg>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-white">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">
                        Product
                    </h3>
                    <ul class="mt-4 space-y-4">
                        <li><a href="#" class="text-base text-gray-500 hover:text-gray-900">Features</a></li>
                        <li><a href="#" class="text-base text-gray-500 hover:text-gray-900">Pricing</a></li>
                        <li><a href="#" class="text-base text-gray-500 hover:text-gray-900">API</a></li>
                        <li><a href="#" class="text-base text-gray-500 hover:text-gray-900">Integrations</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">
                        Resources
                    </h3>
                    <ul class="mt-4 space-y-4">
                        <li><a href="#" class="text-base text-gray-500 hover:text-gray-900">Documentation</a></li>
                        <li><a href="#" class="text-base text-gray-500 hover:text-gray-900">Guides</a></li>
                        <li><a href="#" class="text-base text-gray-500 hover:text-gray-900">Blog</a></li>
                        <li><a href="#" class="text-base text-gray-500 hover:text-gray-900">Webinars</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">
                        Company
                    </h3>
                    <ul class="mt-4 space-y-4">
                        <li><a href="#" class="text-base text-gray-500 hover:text-gray-900">About</a></li>
                        <li><a href="#" class="text-base text-gray-500 hover:text-gray-900">Careers</a></li>
                        <li><a href="#" class="text-base text-gray-500 hover:text-gray-900">Press</a></li>
                        <li><a href="#" class="text-base text-gray-500 hover:text-gray-900">Partners</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">
                        Legal
                    </h3>
                    <ul class="mt-4 space-y-4">
                        <li><a href="#" class="text-base text-gray-500 hover:text-gray-900">Privacy</a></li>
                        <li><a href="#" class="text-base text-gray-500 hover:text-gray-900">Terms</a></li>
                        <li><a href="#" class="text-base text-gray-500 hover:text-gray-900">HIPAA</a></li>
                        <li><a href="#" class="text-base text-gray-500 hover:text-gray-900">Compliance</a></li>
                    </ul>
                </div>
            </div>
            <div class="mt-12 border-t border-gray-200 pt-8 flex flex-col md:flex-row justify-between">
                <div class="flex space-x-6 md:order-2">
                    <a href="#" class="text-gray-400 hover:text-gray-500">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-gray-500">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-gray-500">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-gray-500">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-gray-500">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
                <p class="mt-8 md:mt-0 text-base text-gray-400 md:order-1">
                    &copy; 2022 Cobblepot Health Systems. All rights reserved.
                </p>
            </div>
        </div>
    </footer>

    <script>
        // Simple JavaScript for mobile menu toggle
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuButton = document.querySelector('[aria-controls="mobile-menu"]');
            mobileMenuButton.addEventListener('click', function() {
                const expanded = this.getAttribute('aria-expanded') === 'true';
                this.setAttribute('aria-expanded', !expanded);
                // In a real implementation, you would toggle a mobile menu here
                alert('Mobile menu would open here in a complete implementation.');
            });
            
            // Smooth scrolling for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    document.querySelector(this.getAttribute('href')).scrollIntoView({
                        behavior: 'smooth'
                    });
                });
            });
        });
    </script>
</body>
</html>