<?php

namespace App\Http\Controllers;

use App\Actions\AddAssignmentsAction;
use App\Actions\UpdateAssignmnetAction;
use App\Models\Assignments;
use App\Http\Requests\StoreAssignmentsRequest;
use App\Http\Requests\UpdateAssignmentsRequest;
use Illuminate\Http\JsonResponse;

class AssignmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return response()->json([
            "status" => true,
            "data" => Assignments::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAssignmentsRequest $request, AddAssignmentsAction $action)
    {
        return $action->handle($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Assignments $assignments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Assignments $assignments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAssignmentsRequest $request, UpdateAssignmnetAction $action): JsonResponse
    {
        return $action->handle($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Assignments $assignments): JsonResponse
    {
        $assignments->delete();

        return response()->json([
            "status" => true,
        ]);
    }
}
