{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}

@extends('layouts.app')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">
        <h2 class="text-lg font-semibold">Total Patients</h2>
        <p class="text-3xl font-bold mt-2 text-blue-700">{{ $totalPatients }}</p>
    </div>
    <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">
        <h2 class="text-lg font-semibold">Total Doctors</h2>
        <p class="text-3xl font-bold mt-2 text-green-700">45</p>
    </div>
    <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">
        <h2 class="text-lg font-semibold">Appointments Today</h2>
        <p class="text-3xl font-bold mt-2 text-yellow-600">23</p>
    </div>
</div>
@endsection
