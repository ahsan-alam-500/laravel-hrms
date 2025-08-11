<?php
namespace App\Http\Controllers\Api;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Cache;

class DepartmentController extends Controller
{
    // ✅ Get all departments
    public function index()
    {
        $departments = Cache::remember('departments', 60, function () {
            return Department::all();
        });
        return response()->json($departments);
    }

    // ✅ Create new department
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:departments,name',
            'description' => 'nullable|string',
        ]);

        $department = Department::create($request->all());

        Cache::forget('departments');

        return response()->json([
            'message' => 'Department created successfully',
            'data' => $department
        ], 201);
    }

    // ✅ Show single department
    public function show(Department $department)
    {
        return response()->json($department);
    }

    // ✅ Update department
    public function update(Request $request, Department $department)
    {
        $request->validate([
            'name' => 'required|string|unique:departments,name,' . $department->id,
            'description' => 'nullable|string',
        ]);

        $department->update($request->all());

        Cache::forget('departments');

        return response()->json([
            'message' => 'Department updated successfully',
            'data' => $department
        ]);
    }

    // ✅ Delete department
    public function destroy(Department $department)
    {
        $department->delete();

        Cache::forget('departments');

        return response()->json([
            'message' => 'Department deleted successfully'
        ]);
    }
}
