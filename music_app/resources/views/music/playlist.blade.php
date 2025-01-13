<x-layout>
    <div class="container">
    <h1>Create Playlist</h1>
    <form method="POST" action="{{ route('playlists.store') }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Playlist Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Create</button>
    </form>
</div>
</x-layout>