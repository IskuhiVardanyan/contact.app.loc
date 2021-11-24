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
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index(){
        $user = auth()->user();
        $contacts = $user->contacts()->latestFirst()->paginate(10);
//........Finding authenticated users companies...................
//        $authuser = Auth::id();
//        $companies = Company::orderBy('name')->where('user_id', $authuser)->pluck('name','id')
//            ->prepend('All companies', '');
//.................................................................

//.........Other way of finding authenticated users................
        $companies = $user->companies()->orderBy('name')->pluck('name','id')
            ->prepend('All companies', '');
        return view('contacts.index', compact('contacts', 'companies'));
    }

    public function create(){
        $user = auth()->user();
        $contact = new Contact();
        $companies = $user->companies()->orderBy('name')->pluck('name','id')
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
        ]);
        //dd($request->user());
//.........Other version...............................
//        $authUser = Auth::id();
//        $newContactArray = array_add($request->all(), 'user_id', $authUser);
//        Contact::create($newContactArray);
        $request->user()->contacts()->create($request->all());
        return redirect()->route('contacts.index')->with('message', 'Contact has been added successfully');
    }

    public function show(Contact $contact){
//...........Other version...............
//        $user = auth()->user();
//        $contact = $user->contacts()->findOrFail($id);
//.....This is not used after defining a model in ContactControllers show(Contact $contact) method as its argument.....
//        $contact = Contact::findOrFail($id);
        return view('contacts.show', compact('contact'));
    }

    public function edit($id){
        $user = auth()->user();
        $contact = Contact::findOrFail($id);
        $companies = $user->companies()->orderBy('id')->pluck('name', 'id')
            ->prepend('All companies', '');
        return view('contacts.edit', compact('contact', 'companies'));
    }

    public function update($id, Request $request){
//        DB::enableQueryLog();
//        dd($request->cookie('first_name'));
//        $user = auth()->user();
        $request->validate([
            'first_name'    => 'required',
            'last_name'     => 'required',
            'email'         => 'required|email',
            'address'       => 'required',
            'company_id'    => 'required|exists:companies,id'
        ]);
//        dd($request->all());
        $contact = Contact::findOrFail($id);
        $contact->update($request->all());
//        dd(DB::getQueryLog());
        return redirect()->route('contacts.index')->with('message', 'Contact has been updated successfully');
    }

    public function destroy($id){
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return redirect()->route('contacts.index')->with('message', 'Contact' . " " . $contact->id . " " .
            'has been deleted successfully');
    }
}
