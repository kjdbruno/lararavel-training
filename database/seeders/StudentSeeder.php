<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Student::create([
            'name' => 'Kenneth Jay Bruno',
            'address' => 'San Fernando, La Union',
            'email' => 'brunokennethjay@gmail.com',
            'photo' => 'N/A',
            'grade' => '100',
            'submission_date' => NOW()

        ]);
    }
}
