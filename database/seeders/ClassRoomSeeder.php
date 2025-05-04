<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 50; $i++) {
            DB::table('Students')->insert([
                'name' => 'Student ' . $i,
                'email' => 'student' . $i . '@rupp.com',
                'age' => rand(10, 20),
                'created_at' => now(),
            ]);

        }

        for ($i = 1; $i <= 10; $i++) {
            DB::table('Teachers')->insert([
                'name' => 'Teacher ' . $i,
                'email' => 'teacher' . $i . '@rupp.com',
                'subject' => 'Subject ' . $i,
                'created_at' => now(),
            ]);
        }
    }
}
