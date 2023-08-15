<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index Page</title>
</head>
<body>
    <table>
        <thead>
            <th>ID</th>
            <th>CI number</th>
            <th>Name</th>
            <th>Description</th>
            <th>Technology ID</th>
            <th>Server ID</th>
            <th>Owner ID</th>
            <th>Actions</th>
        </thead>
        <tbody>
            @foreach ($application as $applications)
                <tr>
                    <td>{{ $applications->id }}</td>
                    <td>{{ $applications->ci_number }}</td>
                    <td>{{ $applications->name }}</td>
                    <td>{{ $applications->description }}</td>
                    <td>{{ $applications->technology_id }}</td>
                    <td>{{ $applications->server_id }}</td>
                    <td>{{ $applications->owner_id }}</td>
                    <td>
                        <form action="{{ route('application.destroy', $applications->id) }}" method="post">
                            <button><a href="{{ route('application.edit', $applications->id) }}">Edit</a></button>
                            <button><a href="{{ route('application.show', $applications->id) }}">Show</a></button>
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>