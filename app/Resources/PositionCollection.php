<?php

namespace App\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

final class PositionCollection extends ResourceCollection
{
    public $collects = PositionResource::class;
}
