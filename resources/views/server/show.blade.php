@extends('layouts.dashboard')
@extends('layouts.sidebar')

@section('serverDetailsContent')
<div class="mt-8 bg-white p-4 shadow rounded-lg">
    <div class="bg-white p-4 rounded-md mt-4">
        <div class="flex justify-between items-center mb-2 px-3">
            <h2 class="text-gray-500 text-lg font-semibold">{{ $server->hostname }}</h2>
            <h2 class="text-gray-500 text-lg font-semibold">{{ $server->ip_address }}</h2>
        </div>
        <div class="my-1"></div>
        <div class="bg-gradient-to-r from-cyan-300 to-cyan-500 h-px mb-6"></div>

        {{-- Application Details --}}
        <div class="mt-8 flex flex-wrap space-x-0 space-y-2 md:space-x-4 md:space-y-0">
            <div class="flex-1 bg-white p-4 shadow rounded-lg md:w-1/2">
                <h2 class="text-gray-500 text-lg font-semibold">Server Details</h2>
                <div class="bg-gradient-to-r from-cyan-300 to-cyan-500 h-px mb-6"></div>
                <h1 class="text-gray-500 text-md font-semibold pb-3">Name: {{ $server->hostname }}</h1>
                <h1 class="text-gray-500 text-md font-semibold pb-3">Environment: {{ ($server->environment !== null) ? $server->environment->details : 'Not stated' }}</h1>
                <h1 class="text-gray-500 text-md font-semibold pb-3">Purpose: {{ ($server->purpose !== null) ? $server->purpose->details : 'Not stated' }}</h1>
                <h1 class="text-gray-500 text-md font-semibold pb-3">Operating system: {{ ($server->operating_system !== null) ? $server->operating_system->details : 'Not stated'}}</h1>
                <h1 class="text-gray-500 text-md font-semibold pb-3">Server type: {{ ($server->server_type !== null) ? $server->server_type->details : 'Not stated' }}</h1>
                <h1 class="text-gray-500 text-md font-semibold pb-3">Assigned memory (RAM): {{ ($server->server_memory !== null) ? $server->server_memory : 'Not stated' }}</h1>
                <h1 class="text-gray-500 text-md font-semibold pb-3">Status <div>
                    @livewire('toggle-button',[
                        'model' => $server,
                        'field' => 'status'
                    ])
                </div>
                <button class="bg-cyan-500 hover:bg-cyan-600 text-white font-semibold py-2 px-4 rounded text-right">
                    <a href="{{ route('server.edit', $server->id) }}">Edit</a>
                </button>
            </div>

            <div class="flex-1 bg-white p-4 shadow rounded-lg md:w-1/2">
                <div class="bg-gradient-to-r from-cyan-300 to-cyan-500 h-px mb-6 mt-7"></div>
                <h1 class="text-gray-500 text-md font-semibold pb-3" wire:poll.keep-alive>Runtime: @if ($server->status == 1) {{ App\Models\Server::runtime($server->id)}} (approx) @endif</h1>
                <h1 class="text-gray-500 text-md font-semibold pb-3">Avg Response time: </h1>
                <div class="bg-gradient-to-r from-cyan-300 to-cyan-500 h-px my-8"></div>
                <h1 class="text-gray-500 text-md font-semibold pb-3">Total RAM used: </h1>
                <h1 class="text-gray-500 text-md font-semibold pb-3">Total Disk space used: </h1>
                <h1 class="text-gray-500 text-md font-semibold pb-3">Logs: </h1>
            </div>
        </div>

        {{-- Application Table Graph --}}
        {{-- usage graph --}}
        {{-- <div class="mt-8 flex flex-wrap space-x-0 space-y-2 md:space-x-4 md:space-y-0">
            <div class="flex-1 bg-white p-4 shadow rounded-lg md:w-1/2">
                <h2 class="text-gray-500 text-lg font-semibold pb-1">Performance Indicator </h2>
                <div class="bg-gradient-to-r from-cyan-300 to-cyan-500 h-px mb-6"></div> 
                <div class="chart-container" style="position: relative; height:150px; width:100%">
                    <!-- Graphics canvas -->
                    <canvas id="usageChart"></canvas>
                </div>
            </div>
        </div> --}}

        <!-- Application Table details -->
        <div class="mt-8 flex flex-wrap space-x-0 space-y-2 md:space-x-4 md:space-y-0">
            <div class="flex-1 bg-white p-4 shadow rounded-lg md:w-1/2">
                <h2 class="text-gray-500 text-lg font-semibold">Delete Application</h2>
                <div class="bg-gradient-to-r from-cyan-300 to-cyan-500 h-px mb-6"></div>
                <form action="{{ route('server.destroy', $server->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-cyan-500 hover:bg-cyan-600 text-white font-semibold py-1 px-4 rounded">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection