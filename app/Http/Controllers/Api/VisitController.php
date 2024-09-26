<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Visit;
use Illuminate\Http\Request;

class VisitController extends Controller
{
    public function index()
    {
        return response()->json(Visit::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'keterangan_visit' => 'required|string',
            'tanggal_visit' => 'required|date',
            'pic_visit' => 'required|string',
        ]);

        $visit = Visit::create($validated);

        return response()->json($visit, 201);
    }

    public function show($id)
    {
        $visit = Visit::findOrFail($id);
        return response()->json($visit);
    }

    public function update(Request $request, $id)
    {
        $visit = Visit::findOrFail($id);
        $validated = $request->validate([
            'keterangan_visit' => 'required|string',
            'tanggal_visit' => 'required|date',
            'pic_visit' => 'required|string',
        ]);

        $visit->update($validated);

        return response()->json($visit);
    }

    public function destroy($id)
    {
        $visit = Visit::findOrFail($id);
        $visit->delete();

        return response()->json(null, 204);
    }
}
