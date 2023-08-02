<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class BlogCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */

    public function __construct($resource)
    {
        $this->pagination = [
            'nextPage' => $resource->currentPage() < $resource->lastPage() ? $resource->currentPage() + 1 : null,
        ];

        $resource = $resource->getCollection();

        parent::__construct($resource);
    }

    public function toArray($request)
    {
        return [
            'data' => $this->collection,
            'pagination' => $this->pagination,
        ];
    }
}
