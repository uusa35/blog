<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'subject' => str_limit($this->subject,100,'..'),
            'article' => str_limit($this->article, 200,'..'),
            'views' => $this->viewsCount
        ];
    }
}
