<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AchievementController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'rank' => 'required|string|max:255',
            'file' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $path = null;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/achievements'), $filename);
            $path = 'uploads/achievements/' . $filename;
        }

        \App\Models\Achievement::create([
            'user_id' => \Illuminate\Support\Facades\Auth::id(),
            'name' => $request->name,
            'rank' => $request->rank,
            'file_path' => $path,
        ]);

        return back()->with('success', 'Achievement added successfully.');
    }

    public function update(Request $request, \App\Models\Achievement $achievement)
    {
        if ($achievement->user_id !== \Illuminate\Support\Facades\Auth::id()) {
            abort(403);
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'rank' => 'required|string|max:255',
            'file' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $data = [
            'name' => $request->name,
            'rank' => $request->rank,
        ];

        if ($request->hasFile('file')) {
            // Delete old file
            if (file_exists(public_path($achievement->file_path))) {
                @unlink(public_path($achievement->file_path));
            }

            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/achievements'), $filename);
            $data['file_path'] = 'uploads/achievements/' . $filename;
        }

        $achievement->update($data);

        return back()->with('success', 'Achievement updated successfully.');
    }

    public function destroy(\App\Models\Achievement $achievement)
    {
        if ($achievement->user_id !== \Illuminate\Support\Facades\Auth::id()) {
            abort(403);
        }

        if (file_exists(public_path($achievement->file_path))) {
            @unlink(public_path($achievement->file_path));
        }

        $achievement->delete();

        return back()->with('success', 'Achievement deleted successfully.');
    }
}
