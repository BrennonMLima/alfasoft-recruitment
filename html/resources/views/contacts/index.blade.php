@extends('layouts.app')

@section('content')
    <div class="header">
        <h1 class="title">Contacts List</h1>
        <a href="{{ route('contacts.create') }}" class="btn btn-green">
            <i class="fas fa-plus"></i> Add Contact
        </a>
    </div>

    @if ($contacts->isEmpty())
        <p style="text-align: center;">No contacts registered.</p>
    @else
        @foreach ($contacts as $contact)
            <div class="contact-card">
                <a href="{{ route('contacts.show', $contact->id) }}" class="contact-main-link">
                    <div class="contact-info">
                        <strong>{{ $contact->name }}</strong> - {{ $contact->email }}
                        <i class="fas fa-chevron-right contact-arrow"></i>
                    </div>
                </a>
                
                <div class="contact-actions">
                    <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-primary">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-red" onclick="confirmDelete(event)">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    @endif
@endsection