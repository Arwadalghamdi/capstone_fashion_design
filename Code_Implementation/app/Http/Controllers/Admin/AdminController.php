<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PDO;

class AdminController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        $admins = Admin::paginate(30);
        return view('admin.admins.index', compact('admins'));
    }

    // Show the form for creating a new resource.
    public function create()
    {
        return view('admin.admins.create');
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admin,email',
            'password' => 'required|string|min:8',
            'role'      => 'required'
        ]);

        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role'      => $request->role
        ]);

        return redirect()->route('admin.admins.index')->with('success', 'You have created successfully.');
    }

    // Display the specified resource.
    public function show(Admin $admin)
    {
        $item = $admin;
        return view('admin.admins.show', compact('admin', 'item'));
    }

    // Show the form for editing the specified resource.
    public function edit(Admin $admin)
    {
        $item = $admin;
        return view('admin.admins.edit', compact('admin', 'item'));
    }

    // Update the specified resource in storage.
    public function update(Request $request, Admin $admin)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admin,email,' . $admin->id . ',admin_id',
            'password' => 'nullable|string|min:8',
        ]);

        $admin->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $admin->password,
            'role'      => $request->role
        ]);

        return redirect()->route('admin.admins.index')->with('success', 'You have updated successfully.');
    }

    // Remove the specified resource from storage.
    public function destroy(Admin $admin)
    {
        abort_if(in_array($admin->id, [1]), 404);
        return redirect()->route('admin.admins.index')->with('success', 'You have delete successfully.');
    }
}
