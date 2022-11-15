@extends('layouts.app')
@section('content')
<!-- render a form for the user to upload a picture with a caption -->
<form action="{{ route('photos.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="caption" class="form-label">Caption</label>
      <input name="caption" class="form-control" placeholder="Caption">
    </div>
    <div class="mb-3">
      <label for="photo" class="form-label">Photo</label>
      <input type="file" name="photo" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Upload</button>
</form>
@endsection