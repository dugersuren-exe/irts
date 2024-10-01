<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\TeacherResource;
use App\Http\Resources\StudentResource;
use App\Models\Teacher;
class CourseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        //return parent::toArray($request);
        return [
            "id"=> $this->id,
            "class"=>$this->grade.$this->group,
            "teacher"=> TeacherResource::make($this->teacher),
            "YearLesson"=>$this->YearLesson,
            "students"=>[
                 "count"  =>$this->students->count(),
                 "list"=>StudentResource::collection($this->students)
            ],
            "attendances"=>[
                "count"  =>$this->attendances->count(),
                'list'=>$this->attendances
            ]
        ];

    }
}
