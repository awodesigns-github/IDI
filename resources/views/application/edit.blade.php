<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Application Editor</title>
</head>
<body>
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
    <form action="{{ route('application.update', $application->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <label for="ci_number">CI Number</label>
        <input type="text" name="ci_number" id="ci_number" value="{{ $application->ci_number }}"><br>
        <hr>
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="{{ $application->name }}"><br>
        <hr>
        <label for="description">Application Description</label>
        <textarea name="description" id="description" cols="30" rows="10">{{ $application->description }}</textarea><br>
        <hr>
        <label for="technology_id">Technology ID</label>
        <input type="number" name="technology_id" id="tech_id" value="{{ $application->technology_id }}"><br>
        <hr>
        <label for="server_id">Server ID</label>
        <input type="number" name="server_id" id="server_id" value="{{ $application->server_id }}"><br>
        <hr>
        <label for="owner_id">Owner ID</label>
        <input type="number" name="owner_id" id="owner_id" value="{{ $application->owner_id }}">
        <hr>
        <input type="submit" value="Update Application">
    </form>
</body>
</html>