<?php
namespace app\actions;

use App\Models\Program;
use App\Http\Requests\StoreProgramRequest;
use F9Web\ApiResponseHelpers;
use Illuminate\Http\JsonResponse;

class AddProgramAction
{
    use ApiResponseHelpers;
    public function handle(StoreProgramRequest $request): JsonResponse
    {
        $request->validated($request->all());

        $program = Program::create([
            'name' => $request->name,
            'slug' => $request->slug,
        ]);

        return $this->respondWithSuccess([
            'program' => $program
        ]);
    }
}
