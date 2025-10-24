<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Student;
use App\Models\Book;
use App\Models\Patient;
use App\Models\Doctor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Student::factory(100)->create();
        Patient::factory(50)->create();
        Doctor::factory(10)->create();
        Book::factory(100)->create();
        $this->call(BookSeeder::class);
    }
}
