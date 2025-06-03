<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Homepage</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Custom CSS for animations and additional styling */
        .profile-card {
            transition: all 0.3s ease;
        }
        .profile-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        .appointment-card {
            transition: all 0.3s ease;
        }
        .appointment-card:hover {
            transform: scale(1.02);
        }
        .tab-button.active {
            border-bottom: 3px solid #3b82f6;
            color: #3b82f6;
        }
        .modal {
            transition: opacity 0.3s ease, transform 0.3s ease;
        }
        .modal.show {
            opacity: 1;
            transform: translateY(0);
        }
        .modal.hide {
            opacity: 0;
            transform: translateY(-20px);
        }
    </style>
</head>
<body class="bg-gray-50 font-sans">
    <!-- Navbar -->
    <nav class="bg-white shadow-md fixed top-0 left-0 w-full z-50">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <!-- Logo/Home Button -->
            <a href="{{ url('/') }}" class="flex items-center space-x-2">
                <!-- Example SVG logo, replace with your own if needed -->
                <svg class="h-8 w-8 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="10" />
                    <text x="12" y="16" text-anchor="middle" font-size="10" fill="white" font-family="Arial">CP</text>
                </svg>
                <span class="text-2xl font-bold text-blue-600">CobblepotPortal</span>
            </a>
            <div class="flex items-center space-x-4">
                <!-- Profile Button -->
                <a href="{{ route('profile.show') }}"
                   class="bg-blue-100 text-blue-600 px-4 py-2 rounded-full flex items-center hover:bg-blue-200 transition">
                    <i class="fas fa-user mr-2"></i>
                    <span class="hidden md:inline">Profile</span>
                </a>
                <!-- Logout Button -->
                <button
                    class="bg-blue-600 text-white px-4 py-2 rounded-full flex items-center hover:bg-blue-700 transition"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                >
                    <i class="fas fa-sign-out-alt"></i>
                    <span class="hidden md:inline ml-2">Logout</span>
                </button>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
            </div>
        </div>
    </nav>

    <!-- Add padding to the top of the main content to prevent overlap with navbar -->
    <div class="pt-20"></div>

    
        <!-- Main Content -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Left Column - Profile Section -->
            <div class="lg:col-span-1 space-y-6">
                <!-- Profile Card -->
                <div class="bg-white rounded-xl shadow-md p-6 profile-card">
                    <div class="flex flex-col items-center">
                        <!-- Removed user photo section -->
                        <h2 class="text-xl font-bold">{{ Auth::user()->name }}</h2>
                        <p class="text-gray-500">Member since {{ Auth::user()->created_at->format('Y') }}</p>
                        <span>{{ Auth::user()->email }}</span>
                    </div>

                    <div class="mt-6 space-y-4">
                        
                        <div class="flex items-center">
                            <i class="fas fa-phone text-blue-500 mr-3"></i>
                            <span>{{ Auth::user()->phone ?? 'No phone on file' }}</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-map-marker-alt text-blue-500 mr-3"></i>
                            <span>{{ Auth::user()->address ?? 'No address on file' }}</span>
                        </div>
                    </div>
                </div>

                <!-- Emergency Contact -->
                <div class="bg-white rounded-xl shadow-md p-6 profile-card">
                    <h3 class="text-lg font-semibold mb-4 flex items-center">
                        <i class="fas fa-exclamation-triangle text-red-500 mr-2"></i>
                        Emergency Contact
                    </h3>
                    <div class="space-y-3">
                        <div>
                            <p class="font-medium">{{ Auth::user()->emergency_contact_name ?? 'No contact on file' }}</p>
                            <p class="text-gray-600">{{ Auth::user()->emergency_contact_relationship ?? '' }}</p>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-phone text-red-500 mr-3"></i>
                            <span>{{ Auth::user()->emergency_contact_phone ?? 'No phone on file' }}</span>
                        </div>
                        <button type="button" onclick="openEditContactModal()" class="mt-3 text-blue-600 hover:text-blue-800 text-sm font-medium">
                            <i class="fas fa-edit mr-1"></i> Edit Contact
                        </button>
                    </div>
                </div>

                <!-- Insurance Info -->
                <div class="bg-white rounded-xl shadow-md p-6 profile-card">
                    <h3 class="text-lg font-semibold mb-4 flex items-center">
                        <i class="fas fa-shield-alt text-green-500 mr-2"></i>
                        Insurance Information
                    </h3>
                    <div class="space-y-3">
                        <div>
                            <p class="font-medium">BlueCross BlueShield</p>
                            <p class="text-gray-600">Plan: Gold PPO</p>
                        </div>
                        <div>
                            <p class="text-sm">Member ID: BCBS123456789</p>
                            <p class="text-sm">Group #: 987654</p>
                        </div>
                        <button class="mt-3 text-blue-600 hover:text-blue-800 text-sm font-medium">
                            <i class="fas fa-edit mr-1"></i> Update Insurance
                        </button>
                    </div>
                </div>
            </div>

            <!-- Right Column - Appointments Section -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Appointment Actions -->
                <div class="bg-white rounded-xl shadow-md p-6">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6">
                        <h2 class="text-2xl font-bold text-gray-800">My Appointments</h2>
                        <button id="bookAppointmentBtn" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-full mt-3 sm:mt-0">
                            <i class="fas fa-plus mr-2"></i> Book New Appointment
                        </button>
                    </div>

                    <!-- Tabs -->
                    <div class="flex border-b mb-6">
                        <button class="tab-button active px-4 py-2 font-medium" data-tab="upcoming">Upcoming</button>
                        <button class="tab-button px-4 py-2 font-medium" data-tab="past">Past</button>
                        <button class="tab-button px-4 py-2 font-medium" data-tab="reminders">Reminders</button>
                    </div>

                    <!-- Tab Content -->
                    <div id="upcoming" class="tab-content">
                        <div class="space-y-4">
                            @forelse($upcomingAppointments as $appointment)
                                <div class="appointment-card bg-blue-50 border-l-4 border-blue-500 rounded-lg p-4">
                                    <div class="flex flex-col md:flex-row md:justify-between md:items-center">
                                        <div class="mb-3 md:mb-0">
                                            <h3 class="font-bold text-lg">{{ $appointment->appointment_type ?? 'Appointment' }}</h3>
                                            <p class="text-gray-600">{{ $appointment->doctor_name }}</p>
                                        </div>
                                        <div class="mb-3 md:mb-0">
                                            <p class="font-medium">
                                                <i class="far fa-calendar-alt mr-2 text-blue-500"></i>
                                                {{ \Carbon\Carbon::parse($appointment->date)->format('F d, Y') }}
                                            </p>
                                            <p class="text-gray-600">
                                                <i class="far fa-clock mr-2 text-blue-500"></i>
                                                {{ \Carbon\Carbon::parse($appointment->date)->format('g:i A') }}
                                            </p>
                                        </div>
                                        <div class="flex space-x-2">
                                            <a href="{{ route('appointments.edit', $appointment) }}"
                                               class="reschedule-btn px-3 py-1 bg-white border border-blue-500 text-blue-500 rounded-full text-sm hover:bg-blue-50">
                                                <i class="fas fa-calendar-alt mr-1"></i> Reschedule
                                            </a>
                                            <form action="{{ route('appointments.destroy', $appointment) }}" method="POST" onsubmit="return confirm('Cancel this appointment?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="cancel-btn px-3 py-1 bg-white border border-red-500 text-red-500 rounded-full text-sm hover:bg-red-50">
                                                    <i class="fas fa-times mr-1"></i> Cancel
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p class="text-blue-400">No upcoming appointments.</p>
                            @endforelse
                        </div>
                    </div>

                    <div id="past" class="tab-content hidden">
                        <div class="space-y-4">
                            <!-- Past Appointment 1 -->
                            <div class="appointment-card bg-gray-50 border-l-4 border-gray-400 rounded-lg p-4">
                                <div class="flex flex-col md:flex-row md:justify-between md:items-center">
                                    <div class="mb-3 md:mb-0">
                                        <h3 class="font-bold text-lg">Flu Vaccination</h3>
                                        <p class="text-gray-600">Nurse Amy </p>
                                    </div>
                                    <div class="mb-3 md:mb-0">
                                        <p class="font-medium"><i class="far fa-calendar-alt mr-2 text-gray-500"></i> October 15, 2022</p>
                                        <p class="text-gray-600"><i class="far fa-clock mr-2 text-gray-500"></i> 9:00 AM - 9:15 AM</p>
                                    </div>
                                    <div>
                                        <button class="px-3 py-1 bg-white border border-gray-400 text-gray-600 rounded-full text-sm hover:bg-gray-100">
                                            <i class="fas fa-file-medical mr-1"></i> View Summary
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Past Appointment 2 -->
                            <div class="appointment-card bg-gray-50 border-l-4 border-gray-400 rounded-lg p-4">
                                <div class="flex flex-col md:flex-row md:justify-between md:items-center">
                                    <div class="mb-3 md:mb-0">
                                        <h3 class="font-bold text-lg">Dental Cleaning</h3>
                                        <p class="text-gray-600">Dr. Robert </p>
                                    </div>
                                    <div class="mb-3 md:mb-0">
                                        <p class="font-medium"><i class="far fa-calendar-alt mr-2 text-gray-500"></i> August 5, 2022</p>
                                        <p class="text-gray-600"><i class="far fa-clock mr-2 text-gray-500"></i> 1:30 PM - 2:15 PM</p>
                                    </div>
                                    <div>
                                        <button class="px-3 py-1 bg-white border border-gray-400 text-gray-600 rounded-full text-sm hover:bg-gray-100">
                                            <i class="fas fa-file-medical mr-1"></i> View Summary
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="reminders" class="tab-content hidden">
                        <div class="space-y-4">
                            <!-- Reminder 1 -->
                            <div class="appointment-card bg-yellow-50 border-l-4 border-yellow-500 rounded-lg p-4">
                                <div class="flex items-start">
                                    <div class="bg-yellow-100 p-2 rounded-full mr-4">
                                        <i class="fas fa-exclamation text-yellow-600"></i>
                                    </div>
                                    <div>
                                        <h3 class="font-bold text-lg">Annual Checkup Due</h3>
                                        <p class="text-gray-600">Your annual appointment is due. Last completed on October 15, 2024.</p>
                                        <button class="mt-2 text-blue-600 hover:text-blue-800 text-sm font-medium">
                                            <i class="fas fa-calendar-plus mr-1"></i> Schedule Now
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Reminder 2 -->
                            <div class="appointment-card bg-green-50 border-l-4 border-green-500 rounded-lg p-4">
                                <div class="flex items-start">
                                    <div class="bg-green-100 p-2 rounded-full mr-4">
                                        <i class="fas fa-pills text-green-600"></i>
                                    </div>
                                    <div>
                                        <h3 class="font-bold text-lg">Prescription Refill</h3>
                                        <p class="text-gray-600">Your prescription for Lipitor will run out in 7 days.</p>
                                        <button class="mt-2 text-blue-600 hover:text-blue-800 text-sm font-medium">
                                            <i class="fas fa-syringe mr-1"></i> Request Refill
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Book Appointment Modal -->
    <div id="appointmentModal" class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 opacity-0 pointer-events-none transition-all duration-300">
        <div class="bg-white rounded-xl shadow-xl w-full max-w-md mx-4">
            <div class="p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-bold">Book New Appointment</h3>
                    <button id="closeModal" class="text-gray-500 hover:text-gray-700" type="button">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                
                <form id="appointmentForm" action="{{ route('appointments.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label for="appointmentType" class="block text-sm font-medium text-gray-700 mb-1">Appointment Type</label>
                        <input type="text" name="appointment_type" id="appointmentType" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    
                    <div>
                        <label for="provider" class="block text-sm font-medium text-gray-700 mb-1">Provider</label>
                        <input type="text" name="doctor_name" id="provider" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    
                    <div>
                        <label for="appointmentDate" class="block text-sm font-medium text-gray-700 mb-1">Date</label>
                        <input type="date" name="date" id="appointmentDate" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    
                    <div>
                        <label for="appointmentTime" class="block text-sm font-medium text-gray-700 mb-1">Time</label>
                        <input type="time" name="time" id="appointmentTime" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    
                    <div>
                        <label for="notes" class="block text-sm font-medium text-gray-700 mb-1">Additional Notes</label>
                        <textarea name="notes" id="notes" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                    </div>
                    
                    <div class="flex justify-end">
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-full flex items-center">
                            <i class="fas fa-calendar-plus mr-2"></i> Confirm Appointment
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Emergency Contact Edit Modal -->
    <div id="editContactModal" class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 opacity-0 pointer-events-none transition-all duration-300">
        <div class="bg-white rounded-xl shadow-xl w-full max-w-md mx-4">
            <div class="p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-bold">Edit Emergency Contact</h3>
                    <button id="closeEditContactModal" class="text-gray-500 hover:text-gray-700" type="button">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <form method="POST" action="{{ route('user.updateEmergencyContact') }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2" for="emergency_contact_name">Name</label>
                        <input type="text" name="emergency_contact_name" id="emergency_contact_name" value="{{ Auth::user()->emergency_contact_name }}" class="w-full border rounded px-3 py-2" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2" for="emergency_contact_relationship">Relationship</label>
                        <input type="text" name="emergency_contact_relationship" id="emergency_contact_relationship" value="{{ Auth::user()->emergency_contact_relationship }}" class="w-full border rounded px-3 py-2" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2" for="emergency_contact_phone">Phone</label>
                        <input type="text" name="emergency_contact_phone" id="emergency_contact_phone" value="{{ Auth::user()->emergency_contact_phone }}" class="w-full border rounded px-3 py-2" required>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-full flex items-center">
                            <i class="fas fa-save mr-2"></i> Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // JavaScript for tab functionality
        document.querySelectorAll('.tab-button').forEach(button => {
            button.addEventListener('click', () => {
                const tabId = button.getAttribute('data-tab');
                
                // Remove active class from all buttons
                document.querySelectorAll('.tab-button').forEach(btn => btn.classList.remove('active'));
                // Hide all tab contents
                document.querySelectorAll('.tab-content').forEach(content => content.classList.add('hidden'));
                
                // Add active class to the clicked button
                button.classList.add('active');
                // Show the corresponding tab content
                document.getElementById(tabId).classList.remove('hidden');
            });
        });

        // JavaScript for modal functionality
        const appointmentModal = document.getElementById('appointmentModal');
        const bookAppointmentBtn = document.getElementById('bookAppointmentBtn');
        const closeModalBtn = document.getElementById('closeModal');

        bookAppointmentBtn.addEventListener('click', () => {
            appointmentModal.classList.remove('opacity-0', 'pointer-events-none');
            appointmentModal.classList.add('opacity-100', 'pointer-events-auto');
        });

        closeModalBtn.addEventListener('click', () => {
            appointmentModal.classList.remove('opacity-100', 'pointer-events-auto');
            appointmentModal.classList.add('opacity-0', 'pointer-events-none');
        });

        // Close modal when clicking outside of it
        window.addEventListener('click', (e) => {
            if (e.target === appointmentModal) {
                appointmentModal.classList.remove('opacity-100', 'pointer-events-auto');
                appointmentModal.classList.add('opacity-0', 'pointer-events-none');
            }
        });

        // JavaScript for emergency contact modal functionality
        function openEditContactModal() {
            const modal = document.getElementById('editContactModal');
            modal.classList.remove('opacity-0', 'pointer-events-none');
            modal.classList.add('opacity-100', 'pointer-events-auto');
        }

        document.getElementById('closeEditContactModal').addEventListener('click', function() {
            const modal = document.getElementById('editContactModal');
            modal.classList.remove('opacity-100', 'pointer-events-auto');
            modal.classList.add('opacity-0', 'pointer-events-none');
        });

        // Optional: close modal when clicking outside
        window.addEventListener('click', function(e) {
            const modal = document.getElementById('editContactModal');
            if (e.target === modal) {
                modal.classList.remove('opacity-100', 'pointer-events-auto');
                modal.classList.add('opacity-0', 'pointer-events-none');
            }
        });
    </script>
</body>
</html>