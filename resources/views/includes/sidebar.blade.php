<aside class="w-64 bg-blue-800 text-white flex flex-col">
    <div class="p-6 text-2xl font-bold border-b border-blue-700">
        HMS Admin
    </div>
    <nav class="flex-1 p-4 space-y-2">
        <a href="{{ route('dashboard') }}" class="block px-4 py-4 rounded-lg {{ request()->routeIs('dashboard') ? 'bg-blue-700 font-semibold' : 'hover:bg-blue-700' }}">Dashboard</a>
        <a href="{{ route('patient.index') }}" class="block px-4 py-4 rounded-lg transition {{ request()->routeIs('patient.index') || request()->routeIs('patient.create') || request()->routeIs('patient.edit') ? 'bg-blue-700 font-semibold' : 'hover:bg-blue-700' }}">Patients</a>
        <a href="/doctors" class="block px-4 py-4 rounded-lg hover:bg-blue-700">Doctors</a>
        <a href="/appointments" class="block px-4 py-4 rounded-lg hover:bg-blue-700">Appointments</a>
    </nav>
    <div class="p-4 border-t border-blue-700">
        <button class="w-full bg-blue-700 py-2 rounded-lg hover:bg-blue-600">Logout</button>
    </div>
</aside>
