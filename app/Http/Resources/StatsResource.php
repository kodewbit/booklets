<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StatsResource extends JsonResource
{
    /**
     * @inheritdoc
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'total' => [
                'authors' => $this->total->authors,
                'books' => $this->total->books,
                'genres' => $this->total->genres,
                'languages' => $this->total->languages,
                'sections' => $this->total->sections,
            ],
            'version' => $this->version
        ];
    }
}
