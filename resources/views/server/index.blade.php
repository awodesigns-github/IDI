@extends('layouts.dashboard')
@extends('layouts.sidebar')

@section('serverContent')
@component('components.graph-component', [
    'graphId' => 'usersChart', 
    'title' => 'Server status', 
    'secondTitle' => 'Application count',
    'secondGraphId' => 'serverStatus']
    )
@endcomponent
<div class="mt-8 bg-white p-4 shadow rounded-lg">
    <div class="bg-white p-4 rounded-md mt-4">
        <div class="flex justify-between items-center mb-2">
            <h2 class="text-gray-500 text-lg font-semibold pb-4">Servers</h2>
            <button class="bg-cyan-500 hover:bg-cyan-600 text-white font-semibold py-2 px-4 rounded text-right">
                <a href="{{ route('server.create') }}">Add a Server</a>
            </button>
        </div>
        <div class="my-1"></div>
        <div class="bg-gradient-to-r from-cyan-300 to-cyan-500 h-px mb-6"></div>
        
        {{-- Application Table Index --}}
        <table class="w-full table-auto text-sm">
            <thead>
                <tr class="text-sm leading-normal">
                    {{-- <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b">INDEX</th> --}}
                    <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b">ip address</th>
                    <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b">hostname</th>
                    <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b">environment</th>
                    <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b">purpose</th>
                    <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b">operating system</th>
                    <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b">server type</th>
                    <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b">server memory</th>
                    <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b">disk space</th>
                    {{-- <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b">application</th> --}}
                    <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b">status</th>
                    <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b"></th>
                </tr>
            </thead>
            <tbody> 
                @if (!$server)
                    <tr>
                        <td class="py-2 px-4 border-b border-grey-light font-gray-300">No data to display yet</td>
                    </tr>                        
                @endif
                @foreach ($server as $server)
                    <tr class="hover:bg-gray-300 text-center">
                        {{-- <td class="py-2 px-4 border-b">{{ $application->id }}</td> --}}
                        <td class="py-2 px-4 border-b">{{ $server->ip_address }}</td>
                        <td class="py-2 px-4 border-b">{{ $server->hostname }}</td>
                        <td class="py-2 px-4 border-b">{{ ($server->environment !== null) ? $server->environment->details : '' }}</td>
                        <td class="py-2 px-4 border-b">{{ ($server->purpose !== null) ? $server->purpose->details : ''}}</td>
                        <td class="py-2 px-4 border-b">{{ ($server->operating_system !== null) ? $server->operating_system->details : '' }}</td>
                        <td class="py-2 px-4 border-b">{{ ($server->server_type !== null) ? $server->server_type->details : '' }}</td>
                        <td class="py-2 px-4 border-b">{{ ($server->server_memory !== null) ? $server->server_memory : '' }}</td>
                        <td class="py-2 px-4 border-b">{{ ($server->disk_space !== null) ? $server->disk_space : '' }}</td>
                        {{-- <td class="py-2 px-4 border-b">{{ ($server->application !== null) ? $server->application->name : '' }}</td> --}}
                        <td class="py-2 px-4 border-b space-x-2">@if ($server->status == 1) <span class="text-green-500">UP</span> @else <span class="text-gray-400">DOWN</span>@endif</td>
                        <td class="py-2 px-4 border-b"><a href="{{ route('server.show', $server->id) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                            </svg>
                          </a></td>
                    </tr>   
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection