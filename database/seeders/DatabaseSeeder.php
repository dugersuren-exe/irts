<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // call All seeder 
        $this->call([
            StatSeeder::class,
            TeacherSeeder::class,
            CourseSeeder::class,
        ]);

        //Factory-ийг дуудаж байгаа хэлбэр
        \App\Models\User::factory(10)->create();
        
        \App\Models\Course::factory(10)->create();
        \App\Models\Student::factory(100)->create();

        // Factory-ийг утга олгож дуудах
        \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password'=>'Exe@123',
        ]);
    }
}
