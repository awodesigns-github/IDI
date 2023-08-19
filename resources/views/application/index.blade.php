@extends('layouts.dashboard')
@extends('layouts.sidebar')
@extends('layouts.graph')
@section('applicationsContent')
<!-- Applications -->
    <!-- Applications List Section -->
    <div class="mt-8 bg-white p-4 shadow rounded-lg">
        <div class="bg-white p-4 rounded-md mt-4">
            <h2 class="text-gray-500 text-lg font-semibold pb-4">Applications</h2>
            <div class="my-1"></div>
            <div class="bg-gradient-to-r from-cyan-300 to-cyan-500 h-px mb-6"></div>
            
            {{-- Application Table Index --}}
            <table class="w-full table-auto text-sm">
                <thead>
                    <tr class="text-sm leading-normal">
                        <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b">INDEX</th>
                        <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b">CI number</th>
                        <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b">Name</th>
                        <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b">Description</th>
                        <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b">Technology ID</th>
                        <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b">Server ID</th>
                        <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b">Owner ID</th>
                        <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b">Environment ID</th>
                        <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b">Actions</th>
                    </tr>
                </thead>
                <tbody> 
                    @if (!$application)
                        <tr>
                            <td class="py-2 px-4 border-b border-grey-light font-gray-300">No data to display yet</td>
                        </tr>                        
                    @endif
                    @foreach ($application as $applications)
                        <tr class="hover:bg-gray-300">
                            <td class="py-2 px-4 border-b">{{ $applications->id }}</td>
                            <td class="py-2 px-4 border-b">{{ $applications->ci_number }}</td>
                            <td class="py-2 px-4 border-b">{{ $applications->name }}</td>
                            <td class="py-2 px-4 border-b">{{ Str::limit($applications->description, 20) }}</td>
                            <td class="py-2 px-4 border-b">{{ ($applications->technology !== null) ? $applications->technology->framework : '' }}</td>
                            <td class="py-2 px-4 border-b">{{ ($applications->server !== null) ? $applications->server->ip_address : ''}}</td>
                            <td class="py-2 px-4 border-b">{{ ($applications->owner !== null) ? $applications->owner->name : '' }}</td>
                            <td class="py-2 px-4 border-b">{{ ($applications->environment !== null) ? $applications->environment->details : '' }}</td>
                            <td class="py-2 px-2 border-b flex flex-row space-x-2 pb-5 grow-0 place-content-center">
                                <button class="bg-cyan-500 hover:bg-cyan-600 text-white font-semibold py-1 px-3 rounded"><a href="{{ route('application.edit', $applications->id) }}">Edit</a></button>
                                <button class="bg-cyan-500 hover:bg-cyan-600 text-white font-semibold py-1 px-4 rounded justify-self-center"><a href="{{ route('application.show', $applications->id) }}">Show</a></button>
                                <form action="{{ route('application.destroy', $applications->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-cyan-500 hover:bg-cyan-600 text-white font-semibold py-1 px-4 rounded justify-self-center">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Add an Application -->
            <div class="text-right mt-4">
                <div class="text-right mt-4">
                    <button class="bg-cyan-500 hover:bg-cyan-600 text-white font-semibold py-2 px-4 rounded">
                        <a href="{{ route('application.create') }}">Add an application</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection