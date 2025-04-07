<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        return view('contacts.index', compact('contacts'));
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:5',
            'contact' => 'required|digits:9|unique:contacts',
            'email' => 'required|email|unique:contacts'
        ]);

        Contact::create($validated);

        return redirect()->route('contacts.index')
            ->with('success', 'Contato criado com sucesso!');
    }

    public function show(string $id)
    {
        $contact = Contact::findOrFail($id);
        return view('contacts.show', compact('contact'));
    }

    public function edit(string $id)
    {
        $contact = Contact::findOrFail($id);
        return view('contacts.edit', compact('contact'));
    }

    public function update(Request $request, string $id)
    {
        $contact = Contact::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|min:5',
            'contact' => 'required|digits:9|unique:contacts,contact,'.$contact->id,
            'email' => 'required|email|unique:contacts,email,'.$contact->id
        ]);

        $contact->update($validated);

        return redirect()->route('contacts.index')
            ->with('success', 'Contato atualizado com sucesso!');
    }


    public function destroy(string $id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->route('contacts.index')
            ->with('success', 'Contato excluído com sucesso!');
    }
}