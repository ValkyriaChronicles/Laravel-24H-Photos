@extends('layouts.app')
@section('content')
<h2>{{ $user->username }}</h2>
<h4>{{ $user->first_name.' '.$user->last_name }}
<br>
Total photos uploaded: {{ $photo_count }}</h4>
<div class="row" style="margin-bottom: 70px;">
    <h5 style="margin: 20px 0;">Only photos uploaded in the last 24h are shown</h5>
    @foreach ($photos as $photo)
    <div class="col-md-4">
        <div class="thumbnail img-card">
            <img src="{{ asset('images/'.$photo->photo_path) }}" style="width:100%; max-height: 300px;">
            <div class="caption">
                <p>{{ $photo->caption }}</p>
                <p class="text-muted float-end" style="font-size: .85em;"><i class="fa-regular fa-calendar"></i> {{ date('d-m-Y', strtotime($photo->created_at)) }}</p>
                <p class="text-muted" style="font-size: .85em;"><i class="fa-solid fa-user"></i> Uploaded by: {{ $photo->user->username }}</p>
            </div>
        </div>
    </div>
    @endforeach

    {{ $photos->links() }}
</div>
@endsection