<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;


class ContactController extends Controller
{
    public function index(){
        $contacts = Contact::latestFirst()->filter()->paginate(10);
        $companies = Company::orderBy('name')->pluck('name','id')->prepend('All companies', '');
        //dd($companies);
        return view('contacts.index', compact('contacts', 'companies'));
    }

    public function create(){
        $contact = new Contact();
        $companies = Company::orderBy('name')->pluck('name', 'id')->prepend('All companies', '');
       // dd($companies);
        return view('contacts.create', compact('companies', 'contact'));
    }

    public function store(Request $request){
//        $array = $request->input();
//        dd($array);
        // dd($request->all());
        // dd($request->only('first_name', 'last_name'));
        // dd($request->except('first_name', 'last_name'));
        $request->validate([
            'first_name'    => 'required',
            'last_name'     => 'required',
            'email'         => 'required|email',
            'address'       => 'required',
            'company_id'    => 'required|exists:companies,id'
        ]);
       // dd($request->all());
        Contact::create($request->all());
        return redirect()->route('contacts.index')->with('message', 'Contact has been added successfully');
    }

    public function show($id){
        $contact = Contact::findOrFail($id);
        return view('contacts.show', compact('contact'));
    }

    public function edit($id){
        $contact = Contact::findOrFail($id);
        $companies = Company::orderBy('id')->pluck('name', 'id')->prepend('All companies', '');

        return view('contacts.edit', compact('contact', 'companies'));
    }

    public function update(Request $request, $id){
        //dd($request->cookie('first_name'));
        $request->validate([
            'first_name'    => 'required',
            'last_name'     => 'required',
            'email'         => 'required|email',
            'address'       => 'required',
            'company_id'    => 'required|exists:companies,id'
        ]);
        $contact = Contact::find($id);
        $contact->update($request->all());
        return redirect()->route('contacts.index')->with('message', 'Contact has been updated successfully');
    }

    public function destroy($id){
        $contact = Contact::find($id);
        $contact->delete();
        return redirect()->route('contacts.index')->with('message', 'Contact' . " " . $contact->id . " " .
            'has been deleted successfully');
    }
}
