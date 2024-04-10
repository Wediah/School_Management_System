<?php

namespace App\Http\Controllers;

use App\Actions\AddDepartmentAction;
use App\Actions\UpdateDepartmentAtion;
use App\Models\Department;
use App\Http\Requests\StoreDepartmentRequest;
use App\Http\Requests\UpdateDepartmentRequest;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            "status" => true,
            "data" => Department::all()
        ]);

    }

//    /**
//     * Show the form for creating a new resource.
//     */
//    public function create()
//    {
//
//    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDepartmentRequest $request, AddDepartmentAction $action)
    {
        return $action->handle($request);
    }
//
//    /**
//     * Display the specified resource.
//     */
//    public function show(Department $department, string $id)
//    {
//        Department::filter($id);
//    }
//
//    /**
//     * Show the form for editing the specified resource.
//     */
//    public function edit(Department $department)
//    {
//        //
//    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDepartmentAtion $action, Department $department)
    {
        return $action->handle($department);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        $department->delete();

        return response()->json([
            "status" => true,
        ]);
    }
}
