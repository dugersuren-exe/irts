<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('courses')->delete();
        $datas = [
            ['id' => 1, 'teacher_id' => 20200101,'grade' => 12 , 'group' => 'А', 'YearLesson' => '2024-2025', 'isActive' => true],
            ['id' => 2, 'teacher_id' => 20200102,'grade' => 11 , 'group' => 'А', 'YearLesson' => '2024-2025', 'isActive' => true],
            ['id' => 3, 'teacher_id' => 20200103,'grade' => 10 , 'group' => 'А', 'YearLesson' => '2024-2025', 'isActive' => true],
            ['id' => 4, 'teacher_id' => 20200104,'grade' => 9 , 'group' => 'А', 'YearLesson' => '2024-2025', 'isActive' => true],
            ['id' => 5, 'teacher_id' => 20200105,'grade' => 8 , 'group' => 'А', 'YearLesson' => '2024-2025', 'isActive' => true],
            ['id' => 6, 'teacher_id' => 20200106,'grade' => 7, 'group' => 'А', 'YearLesson' => '2024-2025', 'isActive' => true],
            ['id' => 7, 'teacher_id' => 20200107,'grade' => 7 , 'group' => 'Б', 'YearLesson' => '2024-2025', 'isActive' => true],
        ];
        DB::table('courses')->insert($datas);
    }
}
