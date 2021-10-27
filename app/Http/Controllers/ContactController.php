<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
   public function index(){
       $contacts = Contact::paginate(10);
       return view('contacts.index', compact('contacts'));
   }

    public function create(){
        return view('contacts.create');
    }

    public function show($id){
        $contact = Contact::find($id);
        return view('contacts.show', compact('contact'));
    }

    public function edit($id){
        $contact = Contact::find($id);
        $companies = Company::all();
        return view('contacts.edit', compact('contact', 'companies'));
    }

    public function delete($id){
        $contact = Contact::find($id);
        return view('contacts.index');
    }

}
