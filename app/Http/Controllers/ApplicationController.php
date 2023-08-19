<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplicationRequest;
use App\Models\Application;
use App\Models\Environment;
use App\Models\Owner;
use App\Models\Server;
use App\Models\Technology;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
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
            'application' => Application::query()->orderBy('id','ASC')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
       $servers = Server::query()->select('hostname', 'ip_address', 'id')->orderBy('hostname', 'ASC')->get();
       $environments =  Environment::query()->select('id', 'details')->orderBy('details', 'ASC')->get();
       $owners = Owner::query()->select('id', 'name')->orderBy('name', 'ASC')->get();
       $technologies = Technology::query()->select('id', 'framework', 'database')->orderBy('id', 'ASC')->get();
    //    dd($owners, $environments, $technologies, $servers);
        return view('application.create', ['servers' => $servers, 'environments' => $environments, 'owners' => $owners, 'technologies' => $technologies]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ApplicationRequest $request): RedirectResponse
    {
        $dataValidate = $request->validated();
        
        $application_ticket = uniqid(rand(), true);
        $application_ticket = substr($application_ticket, 0, 5);

        $dataValidate['ci_number'] = "NBC".$application_ticket;
        Application::create($dataValidate);

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
        $servers = Server::query()->select('hostname', 'ip_address', 'id')->orderBy('hostname', 'ASC')->get();
        $environments =  Environment::query()->select('id', 'details')->orderBy('details', 'ASC')->get();
        $owners = Owner::query()->select('id', 'name')->orderBy('name', 'ASC')->get();
        $technologies = Technology::query()->select('id', 'framework', 'database')->orderBy('id', 'ASC')->get();

        return view('application.edit', ['application' => $id, 'servers' => $servers, 'environments' => $environments, 'owners' => $owners, 'technologies' => $technologies]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ApplicationRequest $request, Application $id)
    {
        
        // $id->update($request->validated());
        $id->updateOrFail($request->validated());
        
        return redirect()->route('application.index')->with('success', 'Application updated succesfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Application $id)
    {
       $id->deleteOrFail();

        // auto update id
        DB::statement("SET @count = 0;");
        DB::statement("UPDATE `applications` SET `applications`.`id` = @count:= @count + 1;");
        DB::statement("ALTER TABLE `applications` AUTO_INCREMENT = 1;");

       return redirect()->route('application.index')->with('success', 'Application deleted successfully');

    }
}
