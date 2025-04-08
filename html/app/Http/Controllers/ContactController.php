<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Auth::user()->contacts;
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
            'contact' => [
                'required',
                'digits:9',
                Rule::unique('contacts')->where(function ($query) {
                    return $query->where('user_id', Auth::id());
                })
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('contacts')->where(function ($query) {
                    return $query->where('user_id', Auth::id());
                })
            ]
        ]);

        Auth::user()->contacts()->create($validated);

        return redirect()->route('contacts.index')
            ->with('success', 'Contact created successfully!');
    }

    public function show(Contact $contact)
    {
        $this->authorize('view', $contact);
        return view('contacts.show', compact('contact'));
    }

    public function edit(Contact $contact)
    {
        $this->authorize('update', $contact);
        return view('contacts.edit', compact('contact'));
    }

    public function update(Request $request, Contact $contact)
    {
        $this->authorize('update', $contact);

        $validated = $request->validate([
            'name' => 'required|min:5',
            'contact' => [
                'required',
                'digits:9',
                Rule::unique('contacts')->ignore($contact->id)->where(function ($query) {
                    return $query->where('user_id', Auth::id());
                })
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('contacts')->ignore($contact->id)->where(function ($query) {
                    return $query->where('user_id', Auth::id());
                })
            ]
        ]);

        $contact->update($validated);

        return redirect()->route('contacts.index')
            ->with('success', 'Contact updated successfully!');
    }

    public function destroy(Contact $contact)
    {
        $this->authorize('delete', $contact);
        $contact->delete();

        return redirect()->route('contacts.index')
            ->with('success', 'Contact deleted successfully!');
    }
}