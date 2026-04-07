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
}
