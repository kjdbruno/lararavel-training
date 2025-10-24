@extends('layouts.app')

@section('content')
<h2 class="text-2xl font-bold mb-6 text-gray-800">Edit Patient Information</h2>

<form action="{{ route('patient.update', $patient->id) }}" method="POST" class="bg-white p-6 rounded-2xl shadow max-w-3xl">
    @csrf
    @method('PUT')

    {{-- Name Fields --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div>
            <label class="block text-sm font-semibold mb-2 text-gray-700">First Name</label>
            <input type="text" name="firstname" value="{{ old('firstname', $patient->firstname) }}" class="w-full border rounded-lg p-3 focus:ring focus:ring-blue-300" placeholder="Enter first name">
            @error('firstname') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-semibold mb-2 text-gray-700">Middle Name</label>
            <input type="text" name="middlename" value="{{ old('middlename', $patient->middlename) }}" class="w-full border rounded-lg p-3 focus:ring focus:ring-blue-300" placeholder="Enter middle name">
            @error('middlename') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-semibold mb-2 text-gray-700">Last Name</label>
            <input type="text" name="lastname" value="{{ old('lastname', $patient->lastname) }}" class="w-full border rounded-lg p-3 focus:ring focus:ring-blue-300" placeholder="Enter last name">
            @error('lastname') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>
    </div>

    {{-- Sex & Birthdate --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
        <div>
            <label class="block text-sm font-semibold mb-2 text-gray-700">Sex</label>
            <select name="sex" class="w-full border rounded-lg p-3 focus:ring focus:ring-blue-300">
                <option value="">Select Sex</option>
                <option value="male" {{ old('sex', $patient->sex) == 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ old('sex', $patient->sex) == 'female' ? 'selected' : '' }}>Female</option>
            </select>
            @error('sex') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-semibold mb-2 text-gray-700">Birthdate</label>
            <input type="date" name="birthdate" value="{{ old('birthdate', $patient->birthdate) }}" class="w-full border rounded-lg p-3 focus:ring focus:ring-blue-300">
            @error('birthdate') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>
    </div>

    {{-- Contact Info --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
        <div>
            <label class="block text-sm font-semibold mb-2 text-gray-700">Contact Number</label>
            <input type="text" name="contactnumber" value="{{ old('contactnumber', $patient->contactnumber) }}" class="w-full border rounded-lg p-3 focus:ring focus:ring-blue-300" placeholder="09XXXXXXXXX">
            @error('contactnumber') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-semibold mb-2 text-gray-700">Email</label>
            <input type="email" name="email" value="{{ old('email', $patient->email) }}" class="w-full border rounded-lg p-3 focus:ring focus:ring-blue-300" placeholder="Enter email">
            @error('email') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>
    </div>

    {{-- Address --}}
    <div class="mt-4">
        <label class="block text-sm font-semibold mb-2 text-gray-700">Address</label>
        <textarea name="address" rows="2" class="w-full border rounded-lg p-3 focus:ring focus:ring-blue-300" placeholder="Enter complete address">{{ old('address', $patient->address) }}</textarea>
        @error('address') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    {{-- Blood Type & Allergies --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
        <div>
            <label class="block text-sm font-semibold mb-2 text-gray-700">Blood Type</label>
            <select name="bloodtype" class="w-full border rounded-lg p-3 focus:ring focus:ring-blue-300">
                <option value="">Select Blood Type</option>
                @foreach (['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'] as $type)
                    <option value="{{ $type }}" {{ old('bloodtype', $patient->bloodtype) == $type ? 'selected' : '' }}>{{ $type }}</option>
                @endforeach
            </select>
            @error('bloodtype') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-semibold mb-2 text-gray-700">Allergies</label>
            <select name="allergies" class="w-full border rounded-lg p-3 focus:ring focus:ring-blue-300">
                <option value="">Select Allergy</option>
                @foreach (['None', 'Pollen', 'Seafood', 'Peanuts', 'Dust', 'Latex'] as $allergy)
                    <option value="{{ $allergy }}" {{ old('allergies', $patient->allergies) == $allergy ? 'selected' : '' }}>{{ $allergy }}</option>
                @endforeach
            </select>
            @error('allergies') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>
    </div>

    {{-- Emergency Contact --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
        <div>
            <label class="block text-sm font-semibold mb-2 text-gray-700">Emergency Contact Name</label>
            <input type="text" name="emergencycontactname" value="{{ old('emergencycontactname', $patient->emergencycontactname) }}" class="w-full border rounded-lg p-3 focus:ring focus:ring-blue-300">
            @error('emergencycontactname') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-semibold mb-2 text-gray-700">Emergency Contact Number</label>
            <input type="text" name="emergencycontactnumber" value="{{ old('emergencycontactnumber', $patient->emergencycontactnumber) }}" class="w-full border rounded-lg p-3 focus:ring focus:ring-blue-300" placeholder="09XXXXXXXXX">
            @error('emergencycontactnumber') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>
    </div>

    {{-- Buttons --}}
    <div class="flex justify-end space-x-2 mt-6">
        <a href="{{ route('patient.index') }}" class="bg-gray-500 text-white px-4 py-3 rounded-lg hover:bg-gray-600">Cancel</a>
        <button type="submit" class="bg-blue-700 text-white px-4 py-3 rounded-lg hover:bg-blue-600">Update</button>
    </div>
</form>
@endsection
