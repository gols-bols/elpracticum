<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Document;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Document::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'description' => 'nullable',
            'file' => 'nullable|file',
        ]);

        $path = null;
        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('documents');
            $data['file_path'] = $path;
            $data['mime_type'] = $request->file('file')->getMimeType();
        }

        $doc = Document::create($data);
        return response($doc, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Document::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $doc = Document::findOrFail($id);
        $data = $request->validate([
            'title' => 'sometimes|required|string',
            'description' => 'nullable',
            'file' => 'nullable|file',
        ]);

        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('documents');
            $data['file_path'] = $path;
            $data['mime_type'] = $request->file('file')->getMimeType();
        }

        $doc->update($data);
        return $doc;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $doc = Document::findOrFail($id);
        if ($doc->file_path) {
            Storage::delete($doc->file_path);
        }
        $doc->delete();
        return response(null, 204);
    }
}
