<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Teacher;
class TeacherResource extends JsonResource
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
            'id'=>  $this->id,
            'fullName'=>$this->lastName.'.'.$this->firstName,
            'gender'=> $this->gender,
            'phoneNumber'=> $this->phoneNumber,
            'lesson'=> $this->lesson
        ];
    }
}
