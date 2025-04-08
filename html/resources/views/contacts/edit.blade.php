@extends('layouts.app')

@section('content')
    <div class="form-container">
        <h1 class="form-title">Edit Contact</h1>
        
        <form action="{{ route('contacts.update', $contact->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="{{ old('name', $contact->name) }}" required minlength="5">
                @error('name')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="contact">Contact (9 digits):</label>
                <input type="text" id="contact" name="contact" value="{{ old('contact', $contact->contact) }}" required pattern="\d{9}">
                @error('contact')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="{{ old('email', $contact->email) }}" required>
                @error('email')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="form-actions">
                <a href="{{ route('contacts.index', $contact->id) }}" class="btn btn-secondary">
                    <i class="fas fa-times"></i> Cancel
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-sync-alt"></i> Update Contact
                </button>
            </div>
        </form>
    </div>
@endsection