<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('application.index', [
            'application' => DB::table('applications')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('application.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate application-registration form
        $request->validate([
            'ci_number' => 'required',
            'name' => 'required|min:6|unique:applications',
            'description' => 'required|max:225',
            'technology_id' => 'required',
            'server_id' => 'required',
            'owner_id' => 'required'
        ]);

        Application::create($request->all());

        return redirect()->route('application.index')->with('success', 'Application registered succesfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Application $id)
    {
        return view('application.show', ['application' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Application $id)
    {
      return view('application.edit', ['application' => $id]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Application $id)
    {
        $request->validate([
            'ci_number' => 'required',
            'name' => 'required|min:6',
            'description' => 'required|max:225',
            'technology_id' => 'required',
            'server_id' => 'required',
            'owner_id' => 'required'
        ]);

        $id->update($request->all());
        
        return redirect()->route('application.index')->with('success', 'Application updated succesfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Application $id)
    {
       $id->deleteOrFail();

       return redirect()->route('application.index')->with('success', 'Application deleted successfully');

    }
}
