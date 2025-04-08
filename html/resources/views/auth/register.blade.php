@extends('layouts.app')

@section('content')
<div class="form-container">
    <h1 class="form-title">Register</h1>
    
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-group">
            <label for="name">Name</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
            @error('name')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required>
            @error('email')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input id="password" type="password" name="password" required>
            @error('password')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password-confirm">Confirm Password</label>
            <input id="password-confirm" type="password" name="password_confirmation" required>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary fullsize">
                <i class="fas fa-user-plus"></i> Register
            </button>
        </div>
    </form>
    
    <div class="form-footer" style="margin-top: 20px; text-align: center;">
        Already registered? <a href="{{ route('login') }}" style="padding: 5px 10px;color:#2ecc71">
            <i class="fas fa-sign-in-alt"></i> Login
        </a>
    </div>
</div>
@endsection