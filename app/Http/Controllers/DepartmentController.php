<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('department.index', [
            'department' => DB::table('departments')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('department.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'details' => 'required'
        ]);

        Department::create($request->all());

        return redirect()->route('department.index')->with('success', 'Department created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $id)
    {
        return view('department.show', ['department' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $id)
    {
        return view('department.edit', ['department' => $id]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Department $id)
    {
        $request->validate([
            'details' => 'required'
        ]);

        $id->update($request->all());

        return redirect()->route('department.index')->with('success', 'Department updated succesfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $id)
    {
        $id->deleteOrFail();

        return redirect()->route('department.index')->with('success', 'Department deleted from system succesfully');
    }
}
