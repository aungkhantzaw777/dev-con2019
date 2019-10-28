<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Shedules extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [

            'id' => $this->id,
            'schedule_time' => $this->schedule_time,
            'schedule_sec' => $this->schedule_sec,
            'schedule_title' => $this->schedule_title,
            'schedule_location' => $this->schedule_location,
            'schedule_type' => $this->schedule_type,
            'schedule_date' => $this->id,
            'schedule_desc' => $this->id,
        ];
    }
}
