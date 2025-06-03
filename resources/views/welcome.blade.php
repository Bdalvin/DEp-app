<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - Cobblepot</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 flex flex-col min-h-screen relative">
    <!-- Background Image -->
    <div class="absolute inset-0 w-full h-full bg-cover bg-center -z-10" style="background-image: url('/images/background.jpg');"></div>

    <!-- Top Bar with Login/Register -->
    <nav class="w-full bg-white bg-opacity-70 shadow p-4 flex justify-end space-x-4 relative z-10">
        <a href="{{ route('login') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">Login</a>
        <a href="{{ route('register') }}" class="px-4 py-2 bg-gray-200 text-blue-700 rounded hover:bg-blue-300 transition">Register</a>
        <a href="{{ route('about') }}" class="px-4 py-2 bg-green-100 text-green-700 rounded hover:bg-green-200 transition">About</a>
    </nav>

    <!-- Main Content -->
    <main class="flex-grow flex flex-col items-center justify-center text-center px-4 relative z-10">
        <div class="bg-brown bg-opacity-0 p-8 rounded-xl shadow-xl max-w-2xl w-full">
            <h1 class="text-4xl font-bold text-blue-700 mb-4">Welcome to Cobblepot</h1>
            <p class="text-lg text-white mb-8">
                Your all-in-one healthcare management platform.
            </p>
            <h2 class="text-2xl font-bold text-blue-700 mb-2">What is Cobblepot?</h2>
            <p class="text-white mb-2 max-w-xl mx-auto">
                Cobblepot is your all-in-one healthcare management platform, designed to simplify your medical journey. 
                Book appointments, manage your health records, and stay connected with your care providers—all in one secure place.
            </p>
            <p class="text-white text-sm max-w-xl mx-auto">
                Our mission is to empower patients and providers with seamless, modern healthcare tools. 
                Join us and experience healthcare made easy, accessible, and personal.
            </p>
        </div>
    </main>

    <!-- Footer -->
    <footer class="w-full bg-gray text-center py-4 text-black-400 text-sm">
        &copy; {{ date('Y') }} Cobblepot Health Systems. All rights reserved.
    </footer>

    <script>
        // About Modal functionality
        const aboutBtn = document.getElementById('aboutBtn');
        const aboutModal = document.getElementById('aboutModal');
        const closeAboutModal = document.getElementById('closeAboutModal');

        aboutBtn.addEventListener('click', () => {
            aboutModal.classList.remove('opacity-0', 'pointer-events-none');
            aboutModal.classList.add('opacity-100', 'pointer-events-auto');
        });

        closeAboutModal.addEventListener('click', () => {
            aboutModal.classList.remove('opacity-100', 'pointer-events-auto');
            aboutModal.classList.add('opacity-0', 'pointer-events-none');
        });

        // Close modal when clicking outside the modal content
        window.addEventListener('click', function(e) {
            if (e.target === aboutModal) {
                aboutModal.classList.remove('opacity-100', 'pointer-events-auto');
                aboutModal.classList.add('opacity-0', 'pointer-events-none');
            }
        });
    </script>
</body>
</html>