<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use App\Models\Contact;
use App\Repositories\CompanyRepository;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CompanyRepository $compay)
    {
        $contacts = Contact::where(function ($query) {
            if ($companyID = request()->query("company_id")) {
                $query->where('company_id', $companyID);
            }
        })
                ->where(function ($query) {
                    if ($search = request()->query('search')) {
                        $query->where('first_name', 'LIKE', "%{$search}%")
                        ->orWhere('last_name', 'LIKE', "%{$search}%")
                        ->orWhere('email', 'LIKE', "%{$search}%");
                    }
                })
                ->orderby('id', 'desc')
                ->paginate(7)
                ->withQueryString();

        return view(
            'contacts.index',
            ['contacts' => $contacts,
            'companies' => $compay->withNumOfContact()]
        );

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(CompanyRepository $compay)
    {
        return view('contacts.create', [
        'companies' => $compay->nameWithId()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContactRequest $request)
    {
        Contact::create($request->all());

        $message = 'Concact has been created!';
        return redirect()->route('contacts.index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        return view('contacts.show')->with('contact', $contact);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CompanyRepository $company, $id)
    {
        return view('contacts.edit', [
            'contact' => Contact::findOrFail($id),
            'companies' => $company->nameWithId()
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContactRequest $request, $id)
    {
        $contact = Contact::findOrFail($id);

        if ($contact) {
            $contact->update($request->all());

            $message = 'Contact has been updated!';

            return redirect()->route('contacts.index')->with('message', $message);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Contact::destroy($id);

        return redirect()->route('contacts.index')->with('message', 'One contact has been deleted!');
    }
}