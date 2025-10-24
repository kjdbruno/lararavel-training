@extends('layouts.app')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold">Patients</h2>
    <a href="{{ route('patient.create') }}" class="bg-blue-700 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition">Add Patient</a>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach ($patients as $patient)
        <div class="bg-white rounded-2xl shadow hover:shadow-lg transition transform hover:-translate-y-1 p-5">
            <div class="flex items-center space-x-4">
                <img src="https://ui-avatars.com/api/?name=Patient+{{ $patient->id }}" class="w-16 h-16 rounded-full">
                <div>
                    <h3 class="font-bold text-lg">Patient {{ $patient->firstname }} {{ strtoupper(substr($patient->middlename, 0, 1)) }}. {{ $patient->lastname }}</h3>
                    <p class="text-sm text-gray-500">Age: {{ \Carbon\Carbon::parse($patient->birthdate)->age }}</p>
                    <p class="text-sm text-gray-500">Allergies: {{$patient->allergies}}</p>
                </div>
            </div>
            <div class="mt-4 flex justify-between">
                <a href="{{ route('patient.edit', $patient->id) }}" class="text-blue-600 hover:underline">Edit</a>
                <form action="{{ route('patient.destroy', $patient->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this patient?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 hover:underline">Delete</button>
                </form>
            </div>
        </div>
    @endforeach
</div>
<div class="mt-6">
    {{ $patients->links() }}
</div>
@if (session('success'))
    <script>
        alert("{{ session('success') }}");
    </script>
@endif
@endsection
