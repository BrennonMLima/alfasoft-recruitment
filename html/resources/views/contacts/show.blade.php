@extends('layouts.app')

@section('content')
    <a href="{{ route('contacts.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Back
    </a>
    <div class="detail-card">
        <h1>Contact Details</h1>
        
        <div class="detail-item">
            <strong>Name:</strong> {{ $contact->name }}
        </div>
        <div class="detail-item">
            <strong>Contact:</strong> {{ $contact->contact }}
        </div>
        <div class="detail-item">
            <strong>Email:</strong> {{ $contact->email }}
        </div>
        
        <div class="form-actions">
            <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-primary">
                <i class="fas fa-edit"></i> Edit
            </a>
            <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display: inline;">
                @csrf @method('DELETE')
                <button type="submit" class="btn btn-red" onclick="return confirmDelete()">
                    <i class="fas fa-trash"></i> Delete
                </button>
            </form>
        </div>
    </div>
@endsection