<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Attendance;
use App\Models\Stat;
class StatResource extends JsonResource
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
            'id'=>$this->id,
            'name'=>$this->name,
            'abr'=>$this->name,
            'attendences'=>[
                'count'=>Attendance::all()->count(),
                'data'=>Attendance::all()
            ]
        ];
    }
}
