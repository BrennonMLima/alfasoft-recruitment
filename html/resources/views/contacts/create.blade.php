@extends('layouts.app')

@section('content')
    <h1>Criar Novo Contato</h1>
    <form action="{{ route('contacts.store') }}" method="POST">
        @csrf
        <div>
            <label>Nome:</label>
            <input type="text" name="name" required minlength="5">
        </div>
        <div>
            <label>Contato:</label>
            <input type="text" name="contact" required pattern="\d{9}">
        </div>
        <div>
            <label>E-mail:</label>
            <input type="email" name="email" required>
        </div>
        <button type="submit">Salvar</button>
    </form>
@endsection