<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServerRequest;
use App\Models\Environment;
use App\Models\Operating_system;
use App\Models\Purpose;
use Illuminate\Http\Request;
use App\Models\Server;
use App\Models\Server_type;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class ServerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('server.index', [
            'server' => Server::query()->orderBy('id', 'ASC')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $environment = Environment::query()->select('details','id')->orderBy('details', 'ASC')->get();
        $operatingSystem = Operating_system::query()->select('details','id')->orderBy('details', 'ASC')->get();
        $serverType = Server_type::query()->select('details','id')->orderBy('details', 'ASC')->get();
        $purpose = Purpose::query()->select('details','id')->orderBy('details', 'ASC')->get();

        return view('server.create', ['purpose' => $purpose, 'operatingSystem' => $operatingSystem, 'serverType' => $serverType, 'environment' => $environment]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServerRequest $request):RedirectResponse
    {
        $serverData = $request->validated();
        $serverData['status'] = true;
        Server::create($serverData);

        return redirect()->route('server.index')->banner('Server registered succesfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Server $id)
    {
        return view('server.show', ['server' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Server $id)
    {
        $environment = Environment::query()->select('details','id')->orderBy('details', 'ASC')->get();
        $operatingSystem = Operating_system::query()->select('details','id')->orderBy('details', 'ASC')->get();
        $serverType = Server_type::query()->select('details','id')->orderBy('details', 'ASC')->get();
        $purpose = Purpose::query()->select('details','id')->orderBy('details', 'ASC')->get();

        return view('server.edit', ['server' => $id, 'environment' => $environment, 'operatingSystem' => $operatingSystem, 'serverType' => $serverType, 'purpose' => $purpose]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServerRequest $request, Server $id)
    {
        $id->updateOrFail($request->validated());
        
        return redirect()->route('server.index')->banner('Server updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Server $id)
    {
        $id->deleteOrFail();

        // auto update id
        DB::statement("SET @count = 0;");
        DB::statement("UPDATE `server` SET `server`.`id` = @count:= @count + 1;");
        DB::statement("ALTER TABLE `server` AUTO_INCREMENT = 1;");

       return redirect()->route('server.destroy')->banner('Server deleted successfully.');
    }
}
