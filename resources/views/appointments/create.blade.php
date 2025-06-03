
@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto py-10">
    <h2 class="text-2xl font-bold text-blue-700 mb-6">Book New Appointment</h2>
    <form action="{{ route('appointments.store') }}" method="POST" class="bg-white p-6 rounded shadow">
        @csrf

        <div class="mb-4">
            <label class="block text-gray-700 mb-2" for="date">Date & Time</label>
            <input type="datetime-local" name="date" id="date" value="{{ old('date') }}" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 mb-2" for="doctor_name">Doctor</label>
            <input type="text" name="doctor_name" id="doctor_name" value="{{ old('doctor_name') }}" class="w-full border rounded px-3 py-2" required>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Book Appointment</button>
    </form>
</div>
@endsection