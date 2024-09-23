<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('teachers')->delete();
        $datas = [
            ['id' => 20200101, 'firstName' => 'Дүгэрсүрэн', 'lastName' => 'Б', 'gender' => 'эрэгтэй', 'phoneNumber' => '999', 'lesson' => 'Мэдээлэлзүй'],
            ['id' => 20200102, 'firstName' => 'Баасандорж', 'lastName' => 'Б', 'gender' => 'эрэгтэй', 'phoneNumber' => '8888', 'lesson' => 'Мэдээлэлзүй'],
            ['id' => 20200103, 'firstName' => 'Мөнхбаяр', 'lastName' => 'Б', 'gender' => 'эрэгтэй', 'phoneNumber' => '999', 'lesson' => 'Мэдээлэлзүй'],
            ['id' => 20200104, 'firstName' => 'Ариунсарнай', 'lastName' => 'Б', 'gender' => 'эрэгтэй', 'phoneNumber' => '8888', 'lesson' => 'Мэдээлэлзүй'],
            ['id' => 20200105, 'firstName' => 'Сайнбуян', 'lastName' => 'Б', 'gender' => 'эрэгтэй', 'phoneNumber' => '999', 'lesson' => 'Мэдээлэлзүй'],
            ['id' => 20200106, 'firstName' => 'Хулан', 'lastName' => 'Б', 'gender' => 'эрэгтэй', 'phoneNumber' => '8888', 'lesson' => 'Монгол хэл'],
            ['id' => 20200107, 'firstName' => 'Буяндэлгэр', 'lastName' => 'Б', 'gender' => 'эрэгтэй', 'phoneNumber' => '8888', 'lesson' => 'Монгол хэл'],
        ];
        DB::table('teachers')->insert($datas);

    }
}
