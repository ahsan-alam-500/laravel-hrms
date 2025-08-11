<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Payroll;
use Illuminate\Http\Request;

class PayrollController extends Controller
{
    // Get all payrolls
    public function index()
    {
        $payrolls = Payroll::with('employee')->get();
        return response()->json($payrolls);
    }

    // Create new payroll
    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'month' => 'required|string|unique:payrolls,month',
            'basic_salary' => 'required|numeric|min:0',
            'bonus' => 'nullable|numeric|min:0',
            'deductions' => 'nullable|numeric|min:0',
        ]);

        // calculate net_salary
        $net_salary = $this->calculateNetSalary(
            $request->basic_salary,
            $request->bonus,
            $request->deductions
        );

        $payroll = Payroll::create([
            'employee_id' => $request->employee_id,
            'month' => $request->month,
            'basic_salary' => $request->basic_salary,
            'bonus' => $request->bonus ?? 0,
            'deductions' => $request->deductions ?? 0,
            'net_salary' => $net_salary,
        ]);

        return response()->json($payroll, 201);
    }

    // showing certain id payroll
    public function show($id)
    {
        try {
            $payroll = Payroll::with('employee')->findOrFail($id);
            return response()->json($payroll);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'errors' => [
                    [
                        'status' => '404',
                        'title'  => 'Resource not found',
                        'detail' => 'The requested payroll resource was not found.'
                    ]
                ]
            ], 404);
        }
    }

    // updating certain id payroll
    public function update(Request $request, $id)
    {
        $request->validate([
            'employee_id' => 'sometimes|exists:employees,id',
            'month' => 'sometimes|string',
            'basic_salary' => 'sometimes|numeric|min:0',
            'bonus' => 'nullable|numeric|min:0',
            'deductions' => 'nullable|numeric|min:0',
        ]);

        try {
            $payroll = Payroll::findOrFail($id);

            $payroll->fill($request->only([
                'employee_id',
                'month',
                'basic_salary',
                'bonus',
                'deductions',
            ]));

            $payroll->net_salary = $this->calculateNetSalary(
                $payroll->basic_salary,
                $payroll->bonus,
                $payroll->deductions
            );

            $payroll->save();

            return response()->json($payroll);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'errors' => [
                    [
                        'status' => '404',
                        'title'  => 'Resource not found',
                        'detail' => 'The requested payroll resource was not found.'
                    ]
                ]
            ], 404);
        }
    }

    // deleting certain id payroll
    public function destroy($id)
    {
        try {
            $payroll = Payroll::findOrFail($id);
            $payroll->delete();

            return response()->json(['message' => 'Payroll deleted successfully']);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'errors' => [
                    [
                        'status' => '404',
                        'title'  => 'Resource not found',
                        'detail' => 'The requested payroll resource was not found.'
                    ]
                ]
            ], 404);
        }
    }

    private function calculateNetSalary($basic_salary, $bonus, $deductions)
    {
        return $basic_salary + ($bonus ?? 0) - ($deductions ?? 0);
    }
}
