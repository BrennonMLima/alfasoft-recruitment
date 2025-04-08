@extends('layouts.app')

@section('content')
    <div class="form-container">
        <h1 class="form-title">Create New Contact</h1>
        
        <form action="{{ route('contacts.store') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required minlength="5" placeholder="Enter full name">
                @error('name')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="contact">Contact (9 digits):</label>
                <input type="text" id="contact" name="contact" value="{{ old('contact') }}" required pattern="\d{9}" placeholder="Ex: 999888777">
                @error('contact')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required placeholder="Ex: example@domain.com">
                @error('email')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="form-actions">
                <a href="{{ route('contacts.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Back
                </a>
                <button type="submit" class="btn btn-green">
                    <i class="fas fa-save"></i> Save Contact
                </button>
            </div>
        </form>
    </div>
@endsection