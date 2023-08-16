@extends('layouts.dashboard')
@extends('layouts.sidebar')
@section('applicationsContent')
<!-- Applications -->
    <!-- Applications Section -->
    <div class="mt-8 bg-white p-4 shadow rounded-lg">
        <div class="bg-white p-4 rounded-md mt-4">
            <h2 class="text-gray-500 text-lg font-semibold pb-4">Applications</h2>
            <div class="my-1"></div>
            <div class="bg-gradient-to-r from-cyan-300 to-cyan-500 h-px mb-6"></div>
            
            {{-- Application Table Index --}}
            <table class="w-full table-auto text-sm">
                <thead>
                    <tr class="text-sm leading-normal">
                        <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">ID</th>
                        <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">CI number</th>
                        <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">Name</th>
                        <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">Description</th>
                        <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">Technology ID</th>
                        <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">Server ID</th>
                        <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">Owner ID</th>
                        <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if (!$application)
                        <tr>
                            <td class="py-2 px-4 border-b border-grey-light font-gray-300">No data to display yet</td>
                        </tr>                        
                    @endif
                    @foreach ($application as $applications)
                        <tr class="hover:bg-grey-lighter">
                            <td class="py-2 px-4 border-b border-grey-light">{{ $applications->id }}</td>
                            <td class="py-2 px-4 border-b border-grey-light">{{ $applications->ci_number }}</td>
                            <td class="py-2 px-4 border-b border-grey-light">{{ $applications->name }}</td>
                            <td class="py-2 px-4 border-b border-grey-light">{{ Str::limit($applications->description, 20) }}</td>
                            <td class="py-2 px-4 border-b border-grey-light">{{ $applications->technology_id }}</td>
                            <td class="py-2 px-4 border-b border-grey-light">{{ $applications->server_id }}</td>
                            <td class="py-2 px-4 border-b border-grey-light">{{ $applications->owner_id }}</td>
                            <td class="py-2 px-2 border-b border-grey-light flex flex-row">
                                <form action="{{ route('application.destroy', $applications->id) }}" method="post" class="flex space-x-2 mb-0 pb-0 grow-0">
                                    <button class="bg-cyan-500 hover:bg-cyan-600 text-white font-semibold py-1 px-3 rounded"><a href="{{ route('application.edit', $applications->id) }}">Edit</a></button>
                                    <button class="bg-cyan-500 hover:bg-cyan-600 text-white font-semibold py-1 px-4 rounded justify-self-center"><a href="{{ route('application.show', $applications->id) }}">Show</a></button>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-cyan-500 hover:bg-cyan-600 text-white font-semibold py-1 px-4 rounded justify-self-center ml-3">Delete</button>
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