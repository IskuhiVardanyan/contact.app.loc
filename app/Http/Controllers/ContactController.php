<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;


class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Display a listing of the contacts table.
     *
     * @return View
     */
    public function index():View
    {
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

    /**
     * Show the form for creating a new contact.
     *
     * @return View
     */
    public function create():View
    {
        $user = auth()->user();
        $contact = new Contact();
        $companies = $user->companies()->orderBy('name')->pluck('name','id')
            ->prepend('All companies', '');
       // dd($companies);
        return view('contacts.create', compact('companies', 'contact'));
    }

    /**
     * Store a newly created contact in contacts table.
     *
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request):RedirectResponse
    {
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

    /**
     * Display the specified contact.
     *
     * @param  Contact  $contact
     * @return View
     */
    public function show(Contact $contact):View
    {
//...........Other version...............
//        $user = auth()->user();
//        $contact = $user->contacts()->findOrFail($id);
//.....This is not used after defining a model in ContactControllers show(Contact $contact) method as its argument.....
//        $contact = Contact::findOrFail($id);
        return view('contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified contact.
     *
     * @param  Contact  $contact
     * @return View
     */
    public function edit(Contact $contact):View
    {
        $user = auth()->user();
//        $contact = Contact::findOrFail($id);
        $companies = $user->companies()->orderBy('id')->pluck('name', 'id')
            ->prepend('All companies', '');
        return view('contacts.edit', compact('contact', 'companies'));
    }

    /**
     * Update the specified contact in contacts table.
     *
     * @param  Request  $request
     * @param  Contact  $contact
     * @return RedirectResponse
     */
    public function update(Contact $contact, Request $request):RedirectResponse
    {
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
//        $contact = Contact::findOrFail($id);
        $contact->update($request->all());
//        dd(DB::getQueryLog());
        return redirect()->route('contacts.index')->with('message', 'Contact has been updated successfully');
    }

    /**
     * Remove the specified contact from contacts table.
     *
     * @param  Contact  $contact
     * @return RedirectResponse
     */
    public function destroy(Contact $contact):RedirectResponse
    {
//        $contact = Contact::findOrFail($id);
        $contact->delete();
        return redirect()->route('contacts.index')->with('message', 'Contact' . " " . $contact->id . " " .
            'has been deleted successfully');
    }
}
