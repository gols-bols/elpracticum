<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PracticeReport;

class PracticeReportController extends Controller
{
    public function index()
    {
        return PracticeReport::all();
    }

    public function show($id)
    {
        return PracticeReport::findOrFail($id);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'student_name' => 'required|string',
            'group' => 'nullable|string',
            'supervisor' => 'nullable|string',
            'organization' => 'nullable|string',
            'period' => 'nullable|string',
            'tasks' => 'nullable',
            'conclusion' => 'nullable',
            'file_path' => 'nullable|string',
        ]);

        $report = PracticeReport::create($data);
        return response($report, 201);
    }

    public function update(Request $request, $id)
    {
        $report = PracticeReport::findOrFail($id);
        $data = $request->validate([
            'student_name' => 'sometimes|required|string',
            'group' => 'nullable|string',
            'supervisor' => 'nullable|string',
            'organization' => 'nullable|string',
            'period' => 'nullable|string',
            'tasks' => 'nullable',
            'conclusion' => 'nullable',
            'file_path' => 'nullable|string',
        ]);

        $report->update($data);
        return $report;
    }

    public function destroy($id)
    {
        $report = PracticeReport::findOrFail($id);
        $report->delete();
        return response(null, 204);
    }
}
