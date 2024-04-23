<?php
namespace App\Actions;

use App\Http\Requests\UpdateGradeRequest;
use App\Models\Grade;
use F9Web\ApiResponseHelpers;
use Illuminate\Http\JsonResponse;

class UpdateGradeAction
{
    use ApiResponseHelpers;

    public function handle(UpdateGradeRequest $request, Grade $grade): JsonResponse
    {
        $attributes = $request->validated($request->all());

        $grade->update($attributes);

        return $this->respondWithSuccess([
            'grade' => $grade
        ]);
    }
}
