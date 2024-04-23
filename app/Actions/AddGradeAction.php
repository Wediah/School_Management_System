<?php
namespace App\Actions;

use App\Http\Requests\StoreGradeRequest;
use App\Models\Grade;
use F9Web\ApiResponseHelpers;
use Illuminate\Http\JsonResponse;

class AddGradeAction
{
    use ApiResponseHelpers;

    public function handle(StoreGradeRequest $request): JsonResponse
    {
        $request->validated($request->all());

        $grade = Grade::create([
            'assignment_id' => $request->assignment_id,
            'grade' => $request->grade
        ]);

        return response()->json([
            'success' => true,
            'grade' => $grade
        ]);
    }
}
