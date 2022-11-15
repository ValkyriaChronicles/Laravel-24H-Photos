@extends('layouts.app')
@section('content')
<!-- render a registration form for the user -->
<form action="{{ route('auth.submit_register') }}" method="POST">
    @csrf
    <div class="mb-3">
      <label for="first_name" class="form-label">First Name</label>
      <input name="first_name" class="form-control">
    </div>
    <div class="mb-3">
      <label for="last_name" class="form-label">Last Name</label>
      <input name="last_name" class="form-control">
    </div>
    <div class="mb-3">
      <label for="username" class="form-label">Username</label>
      <input name="username" class="form-control">
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">Email address</label>
      <input type="email" name="email" class="form-control" aria-describedby="emailHelp">
      <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" name="password" class="form-control" id="password">
    </div>
    <div class="mb-3">
      <label for="confirm_password" class="form-label">Confirm Password</label>
      <input type="password" name="confirm_password" class="form-control" id="confirm_password">
    </div>
    <button type="submit" class="btn btn-primary">Register</button>
</form>
@endsection