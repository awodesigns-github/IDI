@extends('layouts.forms')

@section('serverContent')
    <h1 class="text-2xl font-semibold text-center text-gray-500 mt-8 mb-6">Server Registration Form</h1>
    <div>
    <form action="{{ route('server.store') }}" method="POST">
        @csrf
        @method('POST')
        @if ($errors->any())
        <div class="mb-4">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </div>
        @endif
        <div class="mb-4">
            <label for="name" class="block mb-2 text-sm text-gray-600">Server Name</label>
            <input type="text" id="name" name="hostname" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500" required>
        </div>
        <div class="mb-4">
            <label for="server_ip" class="block mb-2 text-sm text-gray-600">Server IP</label>
            <input type="text" id="server_ip" name="ip_address" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500" required>
        </div>

        <div class="mb-4">
            <label for="environment" class="block mb-2 text-sm text-gray-600">Environment</label>
            <select name="environment_id" id="environment" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 text-gray-700">
                <option disabled selected>Choose environment</option>
                @foreach ($environment as $environment)
                    <option value="{{ $environment->id }}">{{ $environment->details }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="purpose" class="block mb-2 text-sm text-gray-600">Purpose</label>
            <select name="purpose_id" id="purpose" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 text-gray-700">
                <option disabled selected>Choose purpose</option>
                @foreach ($purpose as $purposes)
                    <option value="{{ $purposes->id }}">{{ $purposes->details }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="operatingSystem" class="block mb-2 text-sm text-gray-600">Operating System</label>
            <select name="operating_system_id" id="operatingSystem" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 text-gray-700">
                <option disabled selected>Choose Operating System</option>
                @foreach ($operatingSystem as $operatingSystem)
                <option value="{{ $operatingSystem->id }}">{{ $operatingSystem->details }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="serverType" class="block mb-2 text-sm text-gray-600">Server type</label>
            <select name="server_type_id" id="serverType" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 text-gray-700">
                <option disabled selected>Choose Server type</option>
                @foreach ($serverType as $serverType)
                <option value="{{ $serverType->id }}">{{ $serverType->details }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="mb-4">
            <label for="serverMemory" class="block mb-2 text-sm text-gray-600">Assign memory</label>
            <input type="number" id="serverMemory" name="server_memory" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500" min="0" required>
        </div>

        <div class="mb-4">
            <label for="diskSpace" class="block mb-2 text-sm text-gray-600">Assign disk space</label>
            <input type="number" id="diskSpace" name="disk_space" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500" min="0" required>
        </div>
        <input type="submit" value="Register" class="w-40 bg-gradient-to-r from-blue-400 text-gray-100 font-semibold py-2 rounded-lg mx-auto block focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500 mb-2">
    </form>
    <p class="text-xs text-gray-600 text-center mt-8">&copy; 2023</p>
    </div>
    </div>
@endsection