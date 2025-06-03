<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Appointment Management
        </h2>
    </x-slot>

    <div class="max-w-xl mx-auto py-10">
        <h2 class="text-2xl font-bold text-blue-700 mb-6">Reschedule Appointment</h2>
        <form action="{{ route('appointments.update', $appointment) }}" method="POST" class="bg-white p-6 rounded shadow">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-gray-700 mb-2" for="date">Date & Time</label>
                <input type="datetime-local" name="date" id="date" value="{{ old('date', $appointment->date->format('Y-m-d\TH:i')) }}" class="w-full border rounded px-3 py-2" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-2" for="appointment_type">Appointment Type</label>
                <input type="text" name="appointment_type" id="appointment_type" value="{{ old('appointment_type', $appointment->appointment_type) }}" class="w-full border rounded px-3 py-2" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-2" for="doctor_name">Doctor</label>
                <input type="text" name="doctor_name" id="doctor_name" value="{{ old('doctor_name', $appointment->doctor_name) }}" class="w-full border rounded px-3 py-2" required>
            </div>

            <button
                type="submit"
                class="bg-blue-600 text-white px-4 py-2 rounded transition duration-300 ease-in-out transform hover:bg-blue-700 hover:scale-105 shadow-md"
                style="background-color: #2563eb;"
            >
                Update Appointment
            </button>
        </form>
    </div>

</x-app-layout>