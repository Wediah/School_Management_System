<?php
namespace App\Actions;

use App\Http\Requests\UpdateAnswerRequest;
use App\Models\Answer;
use F9Web\ApiResponseHelpers;
use Illuminate\Http\JsonResponse;

class UpdateAnswerAction
{
    use ApiResponseHelpers;

    public function handle(Answer $answer, UpdateAnswerRequest $request): JsonResponse
    {
        $attributes = $request->validated($request->all());

        $answer->update($attributes);

        return $this->respondWithSuccess([
            'answer' => $answer,
        ]);
    }
}
