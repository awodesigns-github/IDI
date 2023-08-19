@extends('layouts.forms')

@section('content')
    <h1 class="text-2xl font-semibold text-center text-gray-500 mt-8 mb-6">Application Registration Form</h1>
    <div>
      <form action="{{ route('application.store') }}" method="POST">
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
          <label for="name" class="block mb-2 text-sm text-gray-600">Application Name</label>
          <input type="text" id="name" name="name" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500" required>
        </div>
        <div class="mb-4">
          <label for="description" class="block mb-2 text-sm text-gray-600">Application Description</label>
          <textarea name="description" id="description" cols="30" rows="8" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500" required></textarea>
        </div>
        <div class="mb-4">
          <label for="technology" class="block mb-2 text-sm text-gray-600">Technology</label>
          <select name="technology_id" id="technology" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 text-gray-700">
            <option>Choose Technology</option>
            @foreach ($technologies as $technology)
              <option value="{{ $technology->id }}">{{ $technology->framework.', '.$technology->database }}</option>
            @endforeach
          </select>
        </div>

        <div class="mb-4">
          <label for="servers" class="block mb-2 text-sm text-gray-600">Servers</label>
          <select name="server_id" id="servers" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 text-gray-700">
            <option>Choose Server</option>
            @foreach ($servers as $server)
              <option value="{{$server->id}}">{{ $server->hostname.', '. $server->ip_address }}</option>
            @endforeach
          </select>
        </div>
        
        <div class="mb-4">
          <label for="owners" class="block mb-2 text-sm text-gray-600">Owners</label>
          <select name="owner_id" id="owners" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 text-gray-700">
            <option>Choose owner</option>
            @foreach ($owners as $owner)
              <option value="{{ $owner->id }}">{{ $owner->name }}</option>
            @endforeach
          </select>
        </div>

        <div class="mb-4">
          <label for="environments" class="block mb-2 text-sm text-gray-600">Environment</label>
          <select name="environment_id" id="environments" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 text-gray-700">
            <option>Choose environment</option>
            @foreach ($environments as $environment)
              <option value="{{ $environment->id }}">{{ $environment->details }}</option>
            @endforeach
          </select>
        </div>
        <input type="submit" value="Register" class="w-40 bg-gradient-to-r from-blue-400 text-gray-100 font-semibold py-2 rounded-lg mx-auto block focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500 mb-2">
      </form>
      <p class="text-xs text-gray-600 text-center mt-8">&copy; 2023</p>
    </div>
  </div>
@endsection