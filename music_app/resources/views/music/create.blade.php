<x-layout>
@section('content')
<div class="container mt-5">
    <h1>Upload Music</h1>
    <form action="{{ route('music.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="album" class="form-label">Album</label>
            <input type="text" name="album" class="form-control">
        </div>
        <div class="mb-3">
            <label for="artist" class="form-label">Artist</label>
            <input type="text" name="artist" class="form-control">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price (Leave blank for free)</label>
            <input type="number" name="price" class="form-control">
        </div>
        <div class="mb-3">
            <label for="file" class="form-label">Music File</label>
            <input type="file" name="file" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>
</div>


</x-layout>