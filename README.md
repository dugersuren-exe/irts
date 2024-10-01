# API апп боловсруулах


API боловсруулах хичээлийг ирц бүртгэлийн project угсрахдаа тайлбарлаад явъя.

Энэхүү project-ийг гүйцэтгэхдээ дараах алхамуудыг хэрэгжүүлэх хэрэгтэй

<details>
<summary> 1. Орчиноо бэлдэх  </summary>

Project-ийг угсрахын тулд эхлээд орчиноо бүрдүүлсэн байх шаардлагатай.
php 8.1.10, mysql, git, commposer зэргийг ашиглахаар сонгож авсан.

Эдгээрийн хувилбарыг дараах командын тусламжтайгаар шалгаж болно.

php-ийн хувилбар
```
php --version
```

composer-ийн хувилбарыг шалгах

```
composer --version
```

git-ийн хувилбарыг шалгах

```
git --version
```
Мөн нэмэлэт байдлаар Laragon-ийг суулган ашиглаж болно.

Laragon-ийг суулгасан тохиолдолд php, composer, mysql гэх мэт програм хангамжууд нь давхар суулгагддаг.

Харин түүнийг  Virtual Environment дээр тохиргоо хийж public байдлаар ашиглах боломжийг бүрдүүлэх хэрэгтэй.



</details>

---


<details>
<summary> 2. Project-оо үүсгэх  </summary>

### Фолдер бэлдэх

Ер нь аливаа project-ийг үүсгэхдээ өөрийн 
Фолдер дотроо үүсгэж байх хэрэгтэй.

Одоо бид жишээ болгон өөрийн project-үүдийг үүсгэх apps нэртэй фолдер дотроо irts нэртэй project үүсгэе.
 Үүний тулд cmd-ийг ашиглан тухайн apps нэртэй фолдер дотроо очсон байх ёстой.

 фолдероо солихдоо cd дараах командыг ашиглаж болно. 

 ```
 cd apps
 ```


Project үүсгэх команд

```
composer create-project laravel/laravel irts
```

Тухайн project-оо ажиллуулж үзэх. Үүний тулд irts нэртэй фолдер дотроо шилжсэн байх ёстой.

Мөн VSCode ашиглаж байгаа бол тухайн irts нэртэй фолдерийг нээх ёстой. Гадна талын фолдер эсвэл дотор талын фолдерийг нээсэн тохиолдолд ажиллахгүй байх магадлалтай.

```
php artisan serve
```

</details>

---

<details>
<summary> 3. Өгөгдлийн баазтай холбох  </summary>

Project-ийг өгөгдлийн баазтай холбохын тулд:
1. mySql -ийг суулгасан байх ёстой бөгөөд mySql нь хэвийн ажиллаж байх ёстой.
2. .env файл дээр тохиргоо хийж өгөх ёстой. 

**Жишээ нь**
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=irts
DB_USERNAME=root
DB_PASSWORD=
```

Энэ хэсэгт Mysql -тэй холбогдох тохиргоог хийж хадгална.
</details>

---


<details>
<summary> 4. Authentication-ийг удирдах боломжийг бүрдүүлэх  </summary>

Нэвтрэх, хамгаалалтын нэмэл санг суулгах

```
composer require laravel/breeze --dev
```

Прожект-д цаанаасаа бичигдсэн кодыг нэмж өгөх

```
php artisan breeze:install
```
</details>

---


<details>
<summary> 5. Модел болон migration-ийг үүсгэх  </summary>

Migration нь өгөгдлийн баазад үүсгэх хүснэгт болон тэдгээрийн хоорондын relationship холболтыг зохион байгуулах боломжийг олгодог.

Мөн Relationship холболтыг удирдахын тулд Migration файлыг үүсгэх дараалал нь маш чухал байдаг. Иймд бид дараах байдлаар ажиллуулъя.

```
php artisan make:model Stat
php artisan make:model Teacher
php artisan make:model Course 
php artisan make:model Student 
php artisan make:model Attendance 
```

Мөн migration-ийг үүсгэхдээ тухайн migration-ий Модел -ийг нь хамтад нь үүсгэх боломжтой байдаг.

Тэгэхээр бид дээрх кодыг ажиллуулахгүйгээр хамтад нь дараах кодын тусламжтайгаар үүсгээд явъя.


```
php artisan make:model Stat -m
php artisan make:model Teacher -m
php artisan make:model Course -m
php artisan make:model Student -m
php artisan make:model Attendance -m
```
Дээрх командыг ажиллуулснаар Stat, Teacher, Course, Student, Attendance -ийн тус бүр migration болон Model-ийн нийт 10 файл үүснэ. 

Эхлээд бид Migration файлтай ажиллана. Дараа нь бид үүссэн Model-уудтай ажиллана.

</details>

---


<details>
<summary> 6. Хүснэгт бүрийн талбаруудыг зааж өгөх, үүсгэх  </summary>

Үүссэн Migration файлд хүснэгтийн багануудыг зааж өгнө.

### Stat migration
```
    $table->id();
    $table->string('name');
    $table->string('abr');
```

### Teacher migration
```
    $table->id();
    $table->string('firstName');
    $table->string('lastName');
    $table->string('gender');
    $table->string('phoneNumber');
    $table->string('lesson');
```

### Course migration
```
    $table->id();
    $table->unsignedBigInteger('teacher_id')->index();
    $table->integer('grade');
    $table->string('group');
    $table->string('YearLesson');
    $table->boolean('isActive');
    

    $table->foreign('teacher_id')->references('id')->on('teachers')->cascadeOnDelete();
```


### Student migration
```
    $table->id();
    $table->unsignedBigInteger('course_id')->index();
    $table->string('firstName');
    $table->string('lastName');
    $table->string('gender');
    $table->string('phoneNumber');
    $table->string('RD');
    $table->boolean('isActive');


    $table->foreign('course_id')->references('id')->on('courses')->cascadeOnDelete();
```


### Attendance migration
```
    $table->id();
    $table->unsignedBigInteger('course_id')->index();
    $table->unsignedBigInteger('student_id')->index();
    $table->unsignedBigInteger('stat_id')->index();
    $table->date('adate');
    $table->timestamps();


    $table->foreign('course_id')->references('id')->on('courses')->cascadeOnDelete();
    $table->foreign('student_id')->references('id')->on('students')->cascadeOnDelete();
    $table->foreign('stat_id')->references('id')->on('stats')->cascadeOnDelete();
```

Migration файлд бичигдсэн командын тусламжтайгаар өгөгдлийн бааз (mysql) руу хүснэгтүүдийг үүсгэхдээ дараах командыг ашиглна.

Баазад өмнө нь хүснэгт үүсээгүй байгаа бол migration -ийн тусламжтайгаар хүснэгт үүсгэхдээ дараах командыг ашиглаж болно.

```
php artisan migrate
```

Хэрвээ хуучин хүснэгтүүдээ устгаж шинээр үүсгэхдээ дараах командыг ашиглаж болно.

```
php artisan migrate:refresh
```

### Анхаар!!!

migration хийх үед алдаа гарсан бол дараах командуудын тусламжтайгаар засварлаж болно.


```
composer dump-autoload
```

Migration хийсэн үйлдлийг буцаах үүрэгтэй

```
php artisan migrate:rollback
```

Сүүлийн k ш migration үйлдлийг буцаах

```
php artisan migrate:rollback --step=5
```

Бусад хэлбэрүүд

```
php artisan migrate:rollback --pretend
php artisan migrate:reset
```


</details>

---


<details>
<summary> 7. Seeder-тэй ажиллах </summary>

Seeder нь өгөгдлийн бааз руу өгөгдсөн загвар дата-г оруулах үүрэгтэй байдаг. Энэхүү загвар өгөгдлийг оруулахдаа эхлээд Seeder файлыг үүсгэх ёстой бөгөөд дотор нь өгөгдлүүдээ оруулж хадгалсан байх ёстой.

### Seeder файлыг үүсгэх 

Seeder файлуудыг дараах командын тусламжтайгаар үүсгэнэ.

```
php artisan make:seeder StatSeeder
php artisan make:seeder TeacherSeeder
php artisan make:seeder CourseSeeder

php artisan make:seeder StudentSeeder
php artisan make:seeder AttendanceSeeder
```

Үүссэн файлд хүснэгтэд оруулах өгөгдлийг бичиж хадгалах ёстой.

Жишээ болгон Stat, Teacher, Course Seeder-ийн кодыг авч үзье.

```
<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class StatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('stats')->delete();
        $datas = [
            ['id' => 1, 'name' => 'Ирсэн', 'abr' => 'и'],
            ['id' => 2, 'name' => 'Чөлөөтэй', 'abr' => 'ч'],
            ['id' => 3, 'name' => 'Өвчтэй', 'abr' => 'ө'],
            ['id' => 4, 'name' => 'Тасалсан', 'abr' => 'т'],
        ];
        DB::table('stats')->insert($datas);
    }
}

```

### Анхаарах зүйл!!! 

DB -ийг ашиглаж байгаа учир DB-ийг Seeder файл дотор import хийж оруулах ёстой.

```
use DB;
```

Үүнтэй ижил зарчимаар Teacher болон Course-ийг өгөгдлийг бичнэ. Жишээ болнон гол хэсгийг авч үзье.

### TeacherSeeder 

TeacherSeeder-д нэмэх кодыг доор харуулав. Мөн энэ файлд use DB; -ийг мөн нэмэх ёстой гэдгийг анхаарах хэрэгтэй.

```
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

```

### CourseSeeder 

CourseSeeder-д нэмэх кодыг доор харуулав. Мөн энэ файлд use DB; -ийг мөн нэмэх ёстой гэдгийг анхаарах хэрэгтэй.

```
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
```

Энд бичигдсэн өгөгдлийн дангаар нь ажиллуулахдаа дараах командыг өгөх хэрэгтэй болдог.

StatSeeder-ийг ажиллуулж Stat хүснэгтэд өгөгдлүүдийг оруулахдаа дараах команыг ашиглана.

```
php artisan db:seed --class=StatSeeder
```

TeacherSeeder-ийг ажиллуулж Teacher хүснэгтэд өгөгдлүүдийг оруулахдаа дараах команыг ашиглана.

```
php artisan db:seed --class=TeacherSeeder
```

CourseSeeder-ийг ажиллуулж Course хүснэгтэд өгөгдлүүдийг оруулахдаа дараах команыг ашиглана.

```
php artisan db:seed --class=CoursetSeeder
```

## Даалгавар 1

Таны даалгавар бол үлдсэн StudentSeeder, AttendanceSeeder гэсэн 2 Seeder-ийг үүсгэж оруулах тогтмол өгөгдлийг нэмж ажиллуулах

## Seeder -үүдийг нэгтгэх

Seeder бүрийн кодыг тус бүрд нь ажиллуулахгүйгээр нэг Seeder дуудаж бүгдийг нь зэрэг ажиллуулах боломжтой байдаг. Үүний тулд уг Seeder файлуудыг DatabaseSeeder дотор бичиж өгөөд дуудах боломжтой байдаг. Ийм кодыг авч үзье.


Жишээ болгон StatSeeder-ийн кодыг оруулж байна.

DatabaseSeeder файл дотрох код

```
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
    }
}

```
Уг кодыг бичсний дараар дараах нэг командын тусламжтайгаар 3 seeder файлын өгөгдлийн нэг дор оруулах боломжой болж байна.

```
php artisan db:seed
```

## Даалгавар 2

Та нэмэлтээр бичсэн 2 Seeder файлаа мөн энд байгаа DatabaseSeeder файлд нэмж оруулан дуудах боломжийг бүрдүүлэх. Дараа нь нэг дуудалтаар ажиллаж байгаа эсэхийг шалгаж үзээрэй.


## Нэмэлт мэдээлэл

Мөн DatabaseSeeder файлыг үүсгэчихсэн тохиолдодл өгөгдлийн бааз руу хүснэгтийг үүсгэчихээд DatabaseSeeder файлыг мөн давхар ажиллуулахдаа дараах командыг ажиллуулж болно.

```
php artisan migrate:refresh --seed
```


</details>

---


<details>
<summary> 8. Factory -ийг үүсгэх  </summary>

Facroty команд нь тэст хийхэд зориулагдсан бөгөөд өгөгдлийн сан дахь тухайн хүснэгт рүү санамсаргүйгээр олон тооны өгөгдлийг үүсгэж оруулах боломжийг олгож өгдөг.

Тэгэхээр олон өгөгдөл оруулан тест хийх шаардлагатай өгөгдөл дээр ашиглавал илүү тохиромжтой байдаг. Жишээ нь Stat хүснэгт нь олон тооны өгөгдөл оруулах шаардлагагүй учир StatSeeder-ийн тусламжтайгаар өгөгдлүүдээ оруулж өгөх нь тохиромжтой.

Харин Course хүснэгт ч гэсэн CourseSeeder-ийн тусламжтайгаар өгөгдлүүдээ оруулж болох юм. Гэсэн хэдий ч бид Seeder болон Factory гэсэн 2 хэлбэрээр тестлэх дата-г оруулсан ч болно. Иймд туршилт байдлаар CourseFactory-ийг үүсгэж туршиж үзье.

CourseFactory-ийг үүсгэхдээ дараах командыг өгдөг.


```
php artisan make:factory CourseFactory
```

Үүсгэсэн CourseFactory дотроо хүснэгт рүү санамсаргүйгээр оруулах утгуудыг тодорхойлж өгөх. 

жишээ нь:


```
<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'teacher_id' => $this->faker->numberBetween($min=20200101, $max=20200107),
            'grade' => $this->faker->numberBetween($min=1, $max=13),
            'group' => $this->faker->randomElement(['А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'Ж', 'З']),
            'YearLesson' =>$this->faker->randomElement(['2023-2024', '2022-2023', '2021-2022', '2020-2021']),// $this->faker->sentence(1),
            'isActive' => $this->faker->boolean(),
        ];
    }
}

```

Үүний дараа өгөгдлөө санамсаргүйгээр үүсгэхдээ DatabaseSeeder дотор дуудаж өгөх шаардлагатай байдаг.

Дуудасхдаа дараах кодын тусламжтайгаар дуудаж ажиллуулна.


```
\App\Models\Course::factory(10)->create();
```

Дээрх дуудаж байгаа команд нь Course руу санамсаргүй 10 мөр өгөгдөл үүсгэ гэсэн команд юм.

Үүнтэй ижилээр StudentFactory-ийг үүсгэж болох юм.

Тэгвэл дараах командаар StudentFactory файлаа үүсгэх ёстой.

```
php artisan make:factory StudentFactory
```

Тухайн StudentFactory дотор санамсаргүйгээр өгөгдөл үүсгэх кодыг бичиж өгнө. 


Энд жишээ болгон StudentFactory дотор нэмж бичих гол кодын загварыг оруулж өгвөл.

```
        return [
            'course_id' => $this->faker->numberBetween($min=1, $max=7),
            'firstName' => fake()->name(),
            'lastName' => fake()->name(),
            'gender' =>$this->faker->randomElement(['эрэгтэй', 'эмэгтэй']),
            'phoneNumber' => fake()->name(),
            'RD' =>fake()->name(),
            'isActive' => $this->faker->boolean(),
        ];
```

Үүнийг мөн DatabaseSeeder дотор дуудаж ажиллуулдаг.
Өмнөх код дээр нэмж бичвэл 


```
\App\Models\Course::factory(10)->create();
\App\Models\Student::factory(150)->create();
```

Дээрх код нь Student хүснэгт рүү 150 мөр өгөгдлийг санамсаргүйгээр оруулна гэсэн үг юм.


Уг кодыг бичсний дараар дараах нэг командын тусламжтайгаар 3 seeder  болон 2 Factory-ийг бүгдийг нь ажиллуулахдаа дараах командын тусламжтайгаар дуудаж ажиллуулна.

```
php artisan db:seed
```

</details>

---


<details>
<summary> 9. Model-ийн тохиргоо хийх </summary>


Модел дээр relationship холболт болон нэмэл функцүүдийг бичиж өгснөөр Controller болон Resourse дотор түүнийг дуудан ашиглах, хэрэгцээт өгөгдлүүдээ дуудах боломжтой болно.

Жишээ болнон бид өөрсдийн Model дээр бичигдэх кодыг оруулъя.

## Stat model

```
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stat extends Model
{
    use HasFactory;
    protected $guarded=[];
    public $timestamp=false;
 
    public function attendances(){
        return $this->hasMany(Attendance::class,'stat_id');
    }

}

```

1. Дээрх кодонд байгаа <code> protected $guarded=[]; </code> нь migration дотор тодорхойлогдсон бүх баганыг бүгдийг нь авна гэсэн үг болж байна.

2. Мөн дээрк кодонд <code>public $timestamp=false;</code> гэсэн утга нь StatMigration дотор timestampt талбар байхгүй байгааг илэрхийлж байна.
3. Дээрх кодонд байгаа 
   
    <code> public function attendances(){
        return $this->hasMany(Attendance::class,'stat_id');
    }</code> 
    
    гэсэн код нь Stat хүснэгт нь гадагш <code> нэгээс олон </code> гэсэн холбоосоор Attendence хүснэгт рүү холбогдоно гэдгийг илэрхийлж байна

## Teacher model

```
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function courses(){
        return $this->hasMany(Course::class,'teacher_id');
    }

}

```

## Course model

```
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $guarded=[];
 
    public function teacher(){
        return $this->belongsTo(Teacher::class,'teacher_id');
    }
 
    public function students(){
        return $this->hasMany(Student::class,'course_id');
    }
 
    public function attendances(){
        return $this->hasMany(Attendance::class,'course_id');
    }
}

```

## Student model

```
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function course(){
        return $this->belongsTo(Course::class,'course_id');
    }
 
    public function attendances(){
        return $this->hasMany(Attendance::class,'student_id');
    }
}

```

## Attendance model

```
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    protected $guarded=[];
    public $timestamps = false;
    public function course(){
        return $this->belongsTo(Course::class,'course_id');
    }

    public function student(){
        return $this->belongsTo(Student::class,'student_id');
    }

    public function stat(){
        return $this->belongsTo(Stat::class,'stat_id');
    }
 
    
}

```


</details>

---


<details>
<summary> 10.  </summary>

</details>

---



# Controller үүсгэх

Controller-ийг дараах командын тусламжтайгаар үүсгэнэ.

```
php artisan make:controller StatController --resource
php artisan make:controller StudentController --resource
php artisan make:controller TeacherController --resource
php artisan make:controller CourseController --resource

php artisan make:controller AttendanceController --resource
```


#Route-ийг удирдах

routes/api.php файлд route-үүдийг бичиж өгнө.

1. Шууд route хэсгээс хариулт өгөх хэлбэр

```
Route::get('/greeting', function () {
    return 'Hello World';
});
```
2. Controller-ийн функцийг дуудах үед 
   * Controller-ийг routes/api.php дотор дуудаж оруулж ирнэ.
   * Үндсэн код бичигдэнэ.


```
    Route::get('/courses', [TeacherController::class, 'index']);
    Route::get('/courses/{id}', [TeacherController::class, 'show']);
    Route::post('/courses', [TeacherController::class, 'create']);
    Route::post('/courses/{id}', [TeacherController::class, 'update']);
    Route::delete('/courses/{id}', [TeacherController::class, 'destroy']);
```
Route-ийн дуудалтыг харах командыг өгч болно.

```
php artisan route:list
```

# Resource файлыг үүсгэх

Resource файл нь хэрэглэгч рүү илгээх мэдээллийг форматлах үүрэгтэй байдаг.

```
php artisan make:resource CourseResource 
```

php artisan make:controller PhotoController --model=Photo --resource --requests
31.	 
32.	 
33.	php artisan make:resource GradeResource
34.	 
35.	php artisan make:resource GradeCollection
36.	
