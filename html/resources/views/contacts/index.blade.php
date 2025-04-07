@extends('layouts.app')
@section('content')
    <h1>Lista de Contatos</h1>
    @foreach ($contacts as $contact)
        <div>
            {{ $contact->name }} - {{ $contact->email }}
            <a href="{{ route('contacts.show', $contact->id) }}">Ver</a>

                <a href="{{ route('contacts.edit', $contact->id) }}">Editar</a>
                <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST">
                    @csrf @method('DELETE')
                    <button type="submit">Excluir</button>
                </form>

        </div>
    @endforeach
@endsection