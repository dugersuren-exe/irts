## 1. Орчин бэлтгэх (Laravel)

Дараах орчин бэлтгэх
Laragon -ийг суулгахад (php, nginx, mysql,….)

* php

```
php --version
```

* composer

```
composer --version
```

* git 

```
git --version
```
2.	Фолдер бэлдэх
Фолдер дотроо бэлдэх жишээ нь myapps нэртэй фолдер үүсгэсэх

Тухайн фолдер дотроо project үүсгэх

```
composer create-project laravel/laravel irst
```

3.	Өгөгдлийн баазтай холбох

.env файл дээр тохиргоо хийж өгөх ёстой. 

Жишээ нь:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=irts
DB_USERNAME=root
DB_PASSWORD=
```

4.	Нэвтрэх, хамгаалалтын нэмэл санг суулгах

```
composer require laravel/breeze --dev
php artisan breeze:install
```

5.	Модел болон migration-ийг үүсгэх

```
php artisan make:model Stat -m
php artisan make:model Teacher -m
php artisan make:model Course -m
php artisan make:model Student -m
php artisan make:model Attendance -m
```

migration файл дотор дараах кодыг нэмнэ.


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


## 6. Бааз руу хүснэгт үүсгэх

Migration дээр бичигдсэн командын тусламжтайгаар өгөгдлийн бааз руу хүснэгтүүдийг үүсгэнэ.

Анх migration үүсгэх үед дараах командыг ашиглаж болно.

```
php artisan migrate
```

Хуучин хүснэгтүүдээ устгаж шинээр үүсгэхдээ дараах командыг ашиглаж болно.

```
php artisan migrate:refresh
```

Хуучин хүснэгтүүдээ устгаж шинээр үүсгээд дараа нь Seeder-ийг ажиллуулна.

```
php artisan migrate:refresh --seed
```

migration хийх үед алдаа гарсан бол дараах командын тусламжтайгаар засварлаж болно.

```
composer dump-autoload
```

Migration-ийг буцаах үүрэгтэй

```
php artisan migrate:rollback
```
Сүүлийн k ш migration-ийг буцаах

```
php artisan migrate:rollback --step=5
```

Бусад хэлбэрүүд

```
php artisan migrate:rollback --pretend
php artisan migrate:reset
```
# Seeder үүсгэх 

### Seeder -ийг дараах командын тусламжтайгаар үүсгэх болно.

Seeder файлуудыг дараах командын тусламжтайгаар үүсгэнэ.

```
php artisan make:seeder StatSeeder
php artisan make:seeder TeacherSeeder
php artisan make:seeder CourseSeeder
```

Жишээ болгон StatSeeder-ийн кодыг оруулж байна.

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


Уг StatSeeder-ийн тусламжтайгаар өгөгдлийн баазад өгөгдлүүдийг оруулахдаа дараах комындыг өгнө.

```
php artisan db:seed --class=StatSeeder
```

Үүнтэй ижилээр бусад Seeder үүдийг үүсгэж болно.


```
php artisan db:seed --class=TeacherSeeder
php artisan db:seed --class=TeacherSeeder
```

Ерөнхий seeder-ийг ажиллуулахдаа
php artisan db:seed

# Model-ийн тохиргоо хийх

Модел дээр relationship холболт болон нэмэл функцүүдийг бичиж өгснөөр Controller нь түүнийг ашиглан хэрэгцээт өгөгдлөө дуудах боломжтой болно.

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
 
    public function attendances(){
        return $this->hasMany(Attendance::class,'stat_id');
    }

}

```


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
