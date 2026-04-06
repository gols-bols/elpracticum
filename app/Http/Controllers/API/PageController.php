<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;

class PageController extends Controller
{
    public function index()
    {
        return Page::where('published', true)->get();
    }

    public function show($id)
    {
        return Page::findOrFail($id);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'slug' => 'required|string|unique:pages,slug',
            'content' => 'nullable',
            'meta_title' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'published' => 'boolean',
        ]);

        $page = Page::create($data);
        return response($page, 201);
    }

    public function update(Request $request, $id)
    {
        $page = Page::findOrFail($id);
        $data = $request->validate([
            'title' => 'sometimes|required|string',
            'slug' => 'sometimes|required|string|unique:pages,slug,' . $page->id,
            'content' => 'nullable',
            'meta_title' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'published' => 'boolean',
        ]);

        $page->update($data);
        return $page;
    }

    public function destroy($id)
    {
        $page = Page::findOrFail($id);
        $page->delete();
        return response(null, 204);
    }
}
