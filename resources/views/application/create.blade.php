<form action="{{ route('application.store') }}" method="POST">
    @csrf
    @method('post')
    <label for="ci_number">CI Number</label>
    <input type="text" name="ci_number" id="ci_number"><br>
    <hr>
    <label for="name">Name</label>
    <input type="text" name="name" id="name"><br>
    <hr>
    <label for="description">Application Description</label>
    <textarea name="description" id="description" cols="30" rows="10"></textarea><br>
    <hr>
    <label for="tech_id">Technology ID</label>
    <input type="number" name="technology_id" id="tech_id"><br>
    <hr>
    <label for="server_id">Server ID</label>
    <input type="number" name="server_id" id="server_id"><br>
    <hr>
    <label for="owner_id">Owner ID</label>
    <input type="number" name="owner_id" id="owner_id">
    <hr>
    <input type="submit" value="Register Application">
</form>
