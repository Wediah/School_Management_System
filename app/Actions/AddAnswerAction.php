<?php
namespace App\Actions;

use App\Http\Requests\StoreAnswerRequest;
use App\Models\Answer;
use F9Web\ApiResponseHelpers;
use Illuminate\Http\JsonResponse;

class AddAnswerAction
{
    use ApiResponseHelpers;

    public function handle(StoreAnswerRequest $request): JsonResponse
    {
        $request->validated($request->all());

        $answer = Answer::create([
            'user_id' => $request->user_id,
            'assignment_id' => $request->assignment_id,
            'answer' => $request->answer,
        ]);

        return $this->respondWithSuccess([
            'answer' => $answer,
        ]);
    }
}
