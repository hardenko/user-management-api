<?php

namespace App\Http\Controllers\Api;

use App\Models\Position;
use App\Resources\PositionResource;
use Illuminate\Http\JsonResponse;

final class PositionController extends BaseApiController
{
    public function list(): JsonResponse
    {
        return $this->successResponse([
            'positions' => PositionResource::collection(Position::all()),
        ]);
    }
}
