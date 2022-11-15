@extends('layouts.app')
@section('content')
<!-- render a registration form for the user -->
<form action="{{ route('auth.submit_login') }}" method="POST">
    @csrf
    <div class="mb-3">
      <label for="username" class="form-label">Username</label>
      <input name="username" class="form-control">
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" name="password" class="form-control" id="password">
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
</form>
@endsection