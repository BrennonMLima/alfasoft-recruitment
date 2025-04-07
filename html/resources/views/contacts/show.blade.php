@extends('layouts.app')

@section('content')
    <h1>Detalhes do Contato</h1>
    <div>
        <p><strong>Nome:</strong> {{ $contact->name }}</p>
        <p><strong>Contato:</strong> {{ $contact->contact }}</p>
        <p><strong>E-mail:</strong> {{ $contact->email }}</p>
    </div>
    @auth
        <a href="{{ route('contacts.edit', $contact->id) }}">Editar</a>
        <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST">
            @csrf @method('DELETE')
            <button type="submit">Excluir</button>
        </form>
    @endauth
@endsection