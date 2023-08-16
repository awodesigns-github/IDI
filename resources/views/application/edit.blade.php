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
            <label for="ci_number" class="block mb-2 text-sm text-gray-600">CI Number</label>
            <input type="text" id="ci_number" name="ci_number" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500" value="{{ $application->ci_number }}" required>
          </div>
          <div class="mb-4">
            <label for="name" class="block mb-2 text-sm text-gray-600">Application Name</label>
            <input type="text" id="name" name="name" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500" value="{{ $application->name }}" required>
          </div>
          <div class="mb-4">
            <label for="description" class="block mb-2 text-sm text-gray-600">Application Description</label>
            <textarea name="description" id="description" cols="30" rows="10" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500" required>{{ $application->description }}</textarea>
          </div>
          <div class="mb-4">
              <label for="technology_id" class="block mb-2 text-sm text-gray-600">Technology ID</label>
              <input type="number" id="technology_id" name="technology_id" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500" value="{{ $application->technology_id }}" required>
          </div>
        
          <div class="mb-4">
              <label for="server_id" class="block mb-2 text-sm text-gray-600">Server ID</label>
              <input type="number" id="server_id" name="server_id" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500" value="{{ $application->server_id }}" required>
          </div>
        
          <div class="mb-4">
              <label for="owner_id" class="block mb-2 text-sm text-gray-600">Owner ID</label>
              <input type="number" id="owner_id" name="owner_id" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500" value="{{ $application->owner_id }}" required>
          </div>
          <input type="submit" value="Update" class="w-40 bg-gradient-to-r from-blue-400 text-gray-100 font-semibold py-2 rounded-lg mx-auto block focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500 mb-2">
        </form>
        <p class="text-xs text-gray-600 text-center mt-8">&copy; 2023</p>
        </div>
        </div>        
    </form>
@endsection


