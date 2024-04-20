<?php
namespace App\Actions;

use App\Http\Requests\UpdateAssignmentsRequest;
use F9Web\ApiResponseHelpers;
use Illuminate\Http\JsonResponse;

class UpdateAssignmnetAction
{
    use ApiResponseHelpers;
    public function handle(Assignment $assignment, UpdateAssignmentsRequest $request): JsonResponse
    {
        $attributes = $request->validated($request->all());

        $assignment->update($attributes);

        return $this->respondWithSuccess([
            'assignment' => $assignment
        ]);
    }
}
