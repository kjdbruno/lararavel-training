@extends('layouts.app')

@section('content')
    <h2 class="mb-4">List of Students</h2>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
            <div class="card shadow-sm">
                <svg class="bd-placeholder-img card-img-top" width="100%" height="225"
                xmlns="http://www.w3.org/2000/svg"><rect width="100%" height="100%" fill="#6c757d" />
                    <text x="50%" y="50%" fill="#fff" dy=".3em" text-anchor="middle">Student Photo</text>
                </svg>
                <div class="card-body">
                    <h5 class="card-title">John Doe</h5>
                    <p class="card-text">BS Computer Science - 3rd Year</p>
                    <button class="btn btn-sm btn-outline-primary">View</button>
                    <button class="btn btn-sm btn-outline-secondary">Edit</button>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card shadow-sm">
                <svg class="bd-placeholder-img card-img-top" width="100%" height="225"
                xmlns="http://www.w3.org/2000/svg"><rect width="100%" height="100%" fill="#6c757d" />
                    <text x="50%" y="50%" fill="#fff" dy=".3em" text-anchor="middle">Student Photo</text>
                </svg>
                <div class="card-body">
                    <h5 class="card-title">Jane Smith</h5>
                    <p class="card-text">BS Information Technology - 2nd Year</p>
                    <button class="btn btn-sm btn-outline-primary">View</button>
                    <button class="btn btn-sm btn-outline-secondary">Edit</button>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card shadow-sm">
                <svg class="bd-placeholder-img card-img-top" width="100%" height="225"
                xmlns="http://www.w3.org/2000/svg"><rect width="100%" height="100%" fill="#6c757d" />
                    <text x="50%" y="50%" fill="#fff" dy=".3em" text-anchor="middle">Student Photo</text>
                </svg>
                <div class="card-body">
                    <h5 class="card-title">Jenny Lim</h5>
                    <p class="card-text">BS Accountancy - 1st Year</p>
                    <button class="btn btn-sm btn-outline-primary">View</button>
                    <button class="btn btn-sm btn-outline-secondary">Edit</button>
                </div>
            </div>
        </div>
    </div>
    @foreach ($students as $student)
        {{ $student['name'] }}
    @endforeach
@endsection
