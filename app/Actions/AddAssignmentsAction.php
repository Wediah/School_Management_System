<?php
namespace App\Actions;

use App\Http\Requests\StoreAssignmentsRequest;
use App\Models\Assignments;
use F9Web\ApiResponseHelpers;

class AddAssignmentsAction
{
    use ApiResponseHelpers;

    public function handle(StoreAssignmentsRequest $request)
    {
        $request->validated($request->all());

        $assignment = Assignments::create([
            'user_id' => $request->user()->id,
            'program_id' => $request->program_id,
            'body' => $request->body,
        ]);

        return $this->respondWithSuccess([
            'assignment' => $assignment,
        ]);
    }
}
