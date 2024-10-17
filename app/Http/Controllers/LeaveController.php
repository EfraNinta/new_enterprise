<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use App\Models\Employee;
use Illuminate\Http\Request;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
          $leaves = Leave::with(['employee.user'])->get(); // Eager load untuk menghindari N+1 problem
            return view('admin.leave.index', compact('leaves'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = Employee::with('user')->get(); // Ambil semua karyawan untuk dropdown
        return view('admin.leave.create', compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id'       => 'required|exists:employees,user_id', // Validasi jika user_id ada di tabel employees
            'description'   => 'required|string',
            'start_of_date' => 'required|date',
            'end_of_date'   => 'required|date|after_or_equal:start_of_date',
            'status'        => 'required|in:pending,approved,rejected',
        ]);

        Leave::create($validatedData);
        return redirect()->route('leave.index')->with('success', 'Cuti berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Leave $leave)
    {
        $employees = Employee::with('user')->get(); // Ambil semua karyawan untuk dropdown
        return view('admin.leave.edit', compact('leave', 'employees'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Leave $leave)
    {
        $validatedData = $request->validate([
            'user_id'       => 'required|exists:employees,user_id',
            'description'   => 'required|string',
            'start_of_date' => 'required|date',
            'end_of_date'   => 'required|date|after_or_equal:start_of_date',
            'status'        => 'required|in:pending,approved,rejected',
        ]);

        $leave->update($validatedData);
        return redirect()->route('leave.index')->with('success', 'Cuti berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Leave $leave)
    {
        $leave->delete();
        return redirect()->route('leave.index')->with('success', 'Cuti berhasil dihapus.');
    }
}
