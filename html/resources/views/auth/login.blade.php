@extends('layouts.app')

@section('content')
<div class="form-container">
    <h1 class="form-title">Login</h1>
    
    <form method="POST" action="{{ route('login') }}">
        @csrf
        
        <div class="form-group">
            <label for="email">Email</label>
            <input id="email" type="email" name="email" required autofocus>
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
        
        <div class="form-actions">
            <button type="submit" class="btn btn-primary fullsize">
                <i class="fas fa-sign-in-alt"></i> Login
            </button>
        </div>
    </form>
    
    <div class="form-footer" style="margin-top: 20px; text-align: center;">
        Don't have an account? <a href="{{ route('register') }}"  style="padding: 5px 10px;color:#3498db;">
            <i class="fas fa-user-plus"></i> Register
        </a>
    </div>
</div>
@endsection