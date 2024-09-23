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

```
php artisan make:seeder StatSeeder
php artisan make:seeder TeacherSeeder
php artisan make:seeder CourseSeeder
```



php artisan make:factory CdateFactory

php artisan db:seed --class=StatSeeder
php artisan db:seed --class=UserSeeder
22.	 
23.	Ерөнхий seeder-ийг ажиллуулахдаа
php artisan db:seed
24.	 
25.	 
26.	php artisan make:controller StatController --resource
php artisan make:controller StudentController --resource
php artisan make:controller TeacherController --resource
php artisan make:controller CourseController --resource
27.	 
28.	php artisan make:controller AttendanceController --resource
29.	 
30.	
php artisan make:controller PhotoController --model=Photo --resource --requests
31.	 
32.	 
33.	php artisan make:resource GradeResource
34.	 
35.	php artisan make:resource GradeCollection
36.	
