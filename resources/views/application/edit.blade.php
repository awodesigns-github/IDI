@extends('layouts.forms')

@section('content')
    <h1>Edit Application</h1>
    <div>
        @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
        @endif
    </div>
        <h1 class="text-2xl font-semibold text-center text-gray-500 mt-8 mb-6">Application Registration Form</h1>
        <form action="{{ route('application.update', $application->id) }}" method="POST">
          @csrf
          @method('PATCH')
          <div class="mb-4">
            <label for="name" class="block mb-2 text-sm text-gray-600">Application Name</label>
            <input type="text" id="name" name="name" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500" value="{{ $application->name }}" required>
          </div>
          <div class="mb-4">
            <label for="description" class="block mb-2 text-sm text-gray-600">Application Description</label>
            <textarea name="description" id="description" cols="30" rows="10" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500" required>{{ $application->description }}</textarea>
          </div>
          <div class="mb-4">
            <label for="technology_id" class="block mb-2 text-sm text-gray-600">Technology</label>
            <select name="technology_id" id="servers" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 text-gray-700">
              <option value="{{ $application->technology_id }}">{{ ($application->technology !== null) ? $application->technology->framework : '' }}</option>
              @foreach ($technologies as $technology)
                <option value="{{ $technology->id }}">{{ $technology->framework.' '.$technology->database }}</option>
              @endforeach
            </select>
          </div>

          <div class="mb-4">
            <label for="server_id" class="block mb-2 text-sm text-gray-600">Server</label>
            <select name="server_id" id="servers" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 text-gray-700">
              <option value="{{ $application->server_id }}">{{ ($application->server !== null) ? $application->server->ip_address : '' }}</option>
              @foreach ($servers as $server)
                <option value="{{ $server->id }}">{{ $server->ip_address. ' '.$server->hostname }}</option>
              @endforeach
            </select>
          </div>

          <div class="mb-4">
            <label for="environment_id" class="block mb-2 text-sm text-gray-600">Environment</label>
            <select name="environment_id" id="environments" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 text-gray-700">
              <option value="{{ $application->environment_id }}">{{ ($application->environment !== null) ? $application->environment->details : '' }}</option>
              @foreach ($environments as $environment)
                <option value="{{ $environment->id }}">{{ $environment->details }}</option>
              @endforeach
            </select>
          </div>

          <div class="mb-4">
            <label for="owners" class="block mb-2 text-sm text-gray-600">Owners</label>
            <select name="owner_id" id="owners" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 text-gray-700">
              <option value="{{ $application->owner_id }}">{{ ($application->owner !== null) ? $application->owner->name : '' }}</option>
              @foreach ($owners as $owner)
                <option value="{{ $owner->id }}">{{ $owner->name }}</option>
              @endforeach
            </select>
          </div>

          <input type="submit" value="Update" class="w-40 bg-gradient-to-r from-blue-400 text-gray-100 font-semibold py-2 rounded-lg mx-auto block focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500 mb-2">
        </form>
        <p class="text-xs text-gray-600 text-center mt-8">&copy; 2023</p>
        </div>
        </div>        
    </form>
@endsection


