<?php
namespace App\Actions;

use App\Http\Requests\StoreAssignmentsRequest;
use F9Web\ApiResponseHelpers;

class AddAssignmentsAction
{
    use ApiResponseHelpers;

    public function handle(StoreAssignmentsRequest $request)
    {
        $request-validated($request-all());
    }
}
