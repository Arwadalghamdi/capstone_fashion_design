<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Designer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DesignerController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        $designers = Designer::paginate(30);
        return view('admin.designers.index', compact('designers'));
    }

    // Display the specified resource.
    public function show(Designer $designer)
    {
        $item = $designer;
        return view('admin.designers.show', compact('designer', 'item'));
    }

    public function updateStatus(Designer $designer, Request $request)
    {
        $designer->update(['account_status' => $request->status]);
        return redirect()->route('admin.designers.index')->with('success', 'You have Updated status successfully.');
    }

    // Remove the specified resource from storage.
    public function destroy(Designer $designer)
    {
        return redirect()->route('admin.designers.index')->with('success', 'You have delete successfully.');
    }
}
