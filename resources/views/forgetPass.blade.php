@extends('layouts.app')
@section('title', 'EL Sewedy Internship')
@section('content')
<div class="container d-flex justify-content-center align-items-center vh-100">
  <div class="card p-4 rounded-3">
    <div class="card-body">
      <h2 class="card-title text-center mb-3">Forgot Password</h2>
      <form method="POST" action="{{ route('forgetPassword') }}">
        @csrf
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" name="email" class="form-control" id="email" required>
        </div>
        <div class="d-grid">
          <button type="submit" class="btn btn-primary btn-lg">Send</button>
        </div>
      </form>
    </div>
  </div>
</div>