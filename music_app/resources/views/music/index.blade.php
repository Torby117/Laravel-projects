<x-layout>
    <div class="container">
        <h1>Your Playlists</h1>
        <a href="{{ route('playlists.create') }}" class="btn btn-primary mb-3">Create New Playlist</a>
        @foreach($playlists as $playlist)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $playlist->name }}</h5>
                <a href="{{ route('playlists.show', $playlist) }}" class="btn btn-info">View Playlist</a>
            </div>
        </div>
        @endforeach
    </div>
<div class="container mt-5">
    <h1>All Music</h1>
    <a href="{{ route('music.create') }}" class="btn btn-primary mb-3">Add Music</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Artist</th>
                <th>Album</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($music as $track)
            <tr>
                <td>{{ $track->title }}</td>
                <td>{{ $track->artist }}</td>
                <td>{{ $track->album }}</td>
                <td>{{ $track->price ? '$' . $track->price : 'Free' }}</td>
                <td>
                    <a href="#" class="btn btn-info btn-sm">Play</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</x-layout>
