@extends('layouts.dashboard')
@extends('layouts.sidebar')
@extends('layouts.graph')
@section('applicationsContent')
<!-- Applications -->
    <!-- Applications List Section -->
    <div class="mt-8 bg-white p-4 shadow rounded-lg">
        <div class="bg-white p-4 rounded-md mt-4">
            <div class="flex justify-between items-center mb-2">
                <h2 class="text-gray-500 text-lg font-semibold pb-4">Applications</h2>
                <button class="bg-cyan-500 hover:bg-cyan-600 text-white font-semibold py-2 px-4 rounded text-right">
                    <a href="{{ route('application.create') }}">Add an application</a>
                </button>
            </div>
            <div class="my-1"></div>
            <div class="bg-gradient-to-r from-cyan-300 to-cyan-500 h-px mb-6"></div>
            
            {{-- Application Table Index --}}
            <table class="w-full table-auto text-sm">
                <thead>
                    <tr class="text-sm leading-normal">
                        {{-- <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b">INDEX</th> --}}
                        <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b">CI number</th>
                        <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b">Name</th>
                        <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b">Description</th>
                        <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b">Technology</th>
                        <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b">Server</th>
                        <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b">Owner</th>
                        <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b">Environment</th>
                        <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b">Status</th>
                        <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b"></th>
                    </tr>
                </thead>
                <tbody> 
                    @if (!$application)
                        <tr>
                            <td class="py-2 px-4 border-b border-grey-light font-gray-300">No data to display yet</td>
                        </tr>                        
                    @endif
                    @foreach ($application as $application)
                        <tr class="hover:bg-gray-300 text-center">
                            {{-- <td class="py-2 px-4 border-b">{{ $application->id }}</td> --}}
                            <td class="py-2 px-4 border-b">{{ $application->ci_number }}</td>
                            <td class="py-2 px-4 border-b">{{ $application->name }}</td>
                            <td class="py-2 px-4 border-b">{{ Str::limit($application->description, 20) }}</td>
                            <td class="py-2 px-4 border-b">{{ ($application->technology !== null) ? $application->technology->framework : '' }}</td>
                            <td class="py-2 px-4 border-b">{{ ($application->server !== null) ? $application->server->ip_address : ''}}</td>
                            <td class="py-2 px-4 border-b">{{ ($application->owner !== null) ? $application->owner->name : '' }}</td>
                            <td class="py-2 px-4 border-b">{{ ($application->environment !== null) ? $application->environment->details : '' }}</td>
                            <td class="py-2 px-4 border-b space-x-2">@if ($application->status == 1) <span class="text-green-500">UP</span> @else <span class="text-gray-400">DOWN</span>@endif</td>
                            <td class="py-2 px-4 border-b"><a href="{{ route('application.show', $application->id) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                                </svg>
                              </a></td>
                            {{-- <td class="py-2 px-2 border-b flex flex-row space-x-2 pb-5 grow-0 place-content-center">
                                <button class="bg-cyan-500 hover:bg-cyan-600 text-white font-semibold py-1 px-3 rounded"><a href="{{ route('application.edit', $applications->id) }}">Edit</a></button>
                                <button class="bg-cyan-500 hover:bg-cyan-600 text-white font-semibold py-1 px-4 rounded justify-self-center"><a href="{{ route('application.show', $applications->id) }}">Show</a></button>
                                <form action="{{ route('application.destroy', $applications->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-cyan-500 hover:bg-cyan-600 text-white font-semibold py-1 px-4 rounded justify-self-center">Delete</button>
                                </form>
                            </td> --}}
                        </tr>   
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection