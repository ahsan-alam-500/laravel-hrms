<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    // GET /employees
    public function index()
    {
        return response()->json(Employee::with('department', 'user')->get());
    }

    // POST /employees
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'employee_code' => 'required|unique:employees',
            'name' => 'required',
            'email' => 'required|email|unique:employees',
            'department_id' => 'required|exists:departments,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $employee = Employee::create($request->all());

        return response()->json(['message' => 'Employee created', 'data' => $employee], 201);
    }

    // GET /employees/{id}
    public function show($id)
    {
        try {
            $employee = Employee::with('department', 'user')->findOrFail($id);
            return response()->json($employee);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'errors' => [
                    [
                        'status' => '404',
                        'title'  => 'Resource not found',
                        'detail' => 'The requested employee resource was not found.'
                    ]
                ]
            ], 404);
        }
    }

    // PUT/PATCH /employees/{id}
    public function update(Request $request, $id)
    {
        try {
            $employee = Employee::findOrFail($id);
            $employee->update($request->all());

            return response()->json(['message' => 'Employee updated', 'data' => $employee]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'errors' => [
                    [
                        'status' => '404',
                        'title'  => 'Resource not found',
                        'detail' => 'The requested employee resource was not found.'
                    ]
                ]
            ], 404);
        }
    }

    // DELETE /employees/{id}
    public function destroy($id)
    {
        try {
            $employee = Employee::findOrFail($id);
            $employee->delete();

            return response()->json(['message' => 'Employee deleted']);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'errors' => [
                    [
                        'status' => '404',
                        'title'  => 'Resource not found',
                        'detail' => 'The requested employee resource was not found.'
                    ]
                ]
            ], 404);
        }
    }
}
