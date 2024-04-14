<?php
namespace app\actions;

use App\Models\Status;
use App\Http\Requests\StoreStatusRequest;
use F9Web\ApiResponseHelpers;
use Illuminate\Http\JsonResponse;

class AddStatusAction
{
    use ApiResponseHelpers;
    public function handle(StoreStatusRequest $request): JsonResponse
    {
        $request->validated($request->all());

        $status = Status::create([
            'name' => $request->name,
            'slug' => $request->slug,
        ]);

        return $this->respondWithSuccess([
            'status' => $status,
        ]);
    }
}
