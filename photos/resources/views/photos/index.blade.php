@extends('layouts.app')
@section('content')
@if (Auth::user())
<div class="float-end">
    <a href="{{ route('photos.create') }}" class="btn btn-primary">Upload a Photo</a>
</div>
@endif
@if (request()->search)
<h2 style="margin-bottom: 60px;">Search Results for "{{ request()->search }}"</h2>
@else
<h2 style="margin-bottom: 60px;">Welcome to Your Feed</h2>
@endif
<div class="row" style="margin-bottom: 70px;">
    @foreach ($photos as $photo)
    <div class="col-md-4">
        <div class="thumbnail img-card">
            <img src="{{ asset('images/'.$photo->photo_path) }}" style="width:100%; max-height: 300px;">
            <div class="caption">
                <p>{{ $photo->caption }}</p>
                <p class="text-muted float-end" style="font-size: .85em;"><i class="fa-regular fa-calendar"></i> {{ date('d-m-Y', strtotime($photo->created_at)) }}</p>
                <p class="text-muted" style="font-size: .85em;"><i class="fa-solid fa-user"></i> Uploaded by: <a href="{{ route('users.show', $photo->user->id) }}">
                    {{ $photo->user->username }}</a></p>
            </div>
        </div>
    </div>
    @endforeach

    {{ $photos->links() }}
</div>
@endsection