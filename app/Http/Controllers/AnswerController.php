<?php

namespace App\Http\Controllers;

use App\Actions\AddAnswerAction;
use App\Actions\UpdateAnswerAction;
use App\Models\Answer;
use App\Http\Requests\StoreAnswerRequest;
use App\Http\Requests\UpdateAnswerRequest;
use Illuminate\Http\JsonResponse;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return response()->json([
            "status" => "success",
            "data" => Answer::all()
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
    public function store(StoreAnswerRequest $request, AddAnswerAction $action): JsonResponse
    {
        return $action->handle($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Answer $answer): JsonResponse
    {
        $answer = Answer::query()->findOrFail($answer);

        return response()->json([
            "status" => "success",
            "data" => $answer
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Answer $answer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAnswerRequest $request, UpdateAnswerAction $action): JsonResponse
    {
        return $action->handle($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Answer $answer): JsonResponse
    {
        $answer->delete();

        return response()->json([
            "status" => "success",
        ]);
    }
}
