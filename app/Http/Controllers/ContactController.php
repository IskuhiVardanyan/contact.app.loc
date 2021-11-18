<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;


class ContactController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('auth')->only('create', 'index');
//    }

    public function index(){
        $authuser = Auth::id();
        $contacts = Contact::latestFirst()->paginate(10);
        $companies = Company::orderBy('name')->where('user_id', $authuser)->pluck('name','id')
            ->prepend('All companies', '');
        //dd($companies);
        return view('contacts.index', compact('contacts', 'companies'));
    }

    public function create(){
        $authuser = Auth::id();
        $contact = new Contact();
        $companies = Company::orderBy('name')->where('user_id', $authuser)->pluck('name','id')
            ->prepend('All companies', '');
       // dd($companies);
        return view('contacts.create', compact('companies', 'contact'));
    }

    public function store(Request $request){
        //dd($request->all());
        // dd($request->only('first_name', 'last_name'));
        // dd($request->except('first_name', 'last_name'));
        $request->validate([
            'first_name'    => 'required',
            'last_name'     => 'required',
            'email'         => 'required|email',
            'address'       => 'required',
            'company_id'    => 'required|exists:companies,id',
            'user_id'       => 'required|exists:users,id'
        ]);
        Contact::create($request->all());
        return redirect()->route('contacts.index')->with('message', 'Contact has been added successfully');
    }

    public function show($id){
        $contact = Contact::findOrFail($id);
        return view('contacts.show', compact('contact'));
    }

    public function edit($id){
        $contact = Contact::findOrFail($id);
        $companies = Company::orderBy('id')->pluck('name', 'id')
            ->prepend('All companies', '');

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
