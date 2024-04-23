<?php

namespace App\Http\Controllers;

use App\Actions\AddGradeAction;
use App\Actions\UpdateGradeAction;
use App\Models\Grade;
use App\Http\Requests\StoreGradeRequest;
use App\Http\Requests\UpdateGradeRequest;
use Illuminate\Http\JsonResponse;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreGradeRequest $request, AddGradeAction $action): JsonResponse
    {
        return $action->handle($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Grade $grade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Grade $grade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGradeRequest $request, UpdateGradeAction $action): JsonResponse
    {
        return $action->handle($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Grade $grade): JsonResponse
    {
        $grade->delete();

        return response()->json([
            'status' => true,
        ]);
    }
}
