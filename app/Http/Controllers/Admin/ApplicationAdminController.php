<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;

class ApplicationAdminController extends Controller
{
    public function index()
    {
        $items = Application::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.applications.index', ['items' => $items]);
    }

    public function show($id)
    {
        $item = Application::findOrFail($id);
        return view('admin.applications.show', ['item' => $item]);
    }

    public function export()
    {
        $filename = 'applications-' . date('Ymd-His') . '.csv';

        $headers = [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];

        $callback = function () {
            $handle = fopen('php://output', 'w');
            // BOM for Excel
            fwrite($handle, chr(0xEF) . chr(0xBB) . chr(0xBF));
            fputcsv($handle, ['ID','Student','Group','Organization','Supervisor','Email','Phone','Message','Status','Created At']);

            Application::orderBy('created_at','desc')->chunk(200, function($rows) use ($handle) {
                foreach ($rows as $r) {
                    fputcsv($handle, [$r->id,$r->student_name,$r->group,$r->organization,$r->supervisor,$r->email,$r->phone,$r->message,$r->status,$r->created_at]);
                }
            });

            fclose($handle);
        };

        return response()->stream($callback, 200, $headers);
    }
}
