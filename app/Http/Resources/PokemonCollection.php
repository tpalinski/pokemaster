<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PokemonCollection extends ResourceCollection
{


 /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public $collects = Pokemon::class;

    /**
     * Transform the resource collection into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection
                ->map
                ->toArray($request)
                ->all(),
            'links' => [
                'self' => 'link-value',
            ],
        ];
    }
}
