@extends('layouts.app')

@section('content')
    <h1>Editar Contato</h1>
    <form action="{{ route('contacts.update', $contact->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label>Nome:</label>
            <input type="text" name="name" value="{{ $contact->name }}" required minlength="5">
        </div>
        <div>
            <label>Contato:</label>
            <input type="text" name="contact" value="{{ $contact->contact }}" required pattern="\d{9}">
        </div>
        <div>
            <label>E-mail:</label>
            <input type="email" name="email" value="{{ $contact->email }}" required>
        </div>
        <button type="submit">Atualizar</button>
    </form>
@endsection