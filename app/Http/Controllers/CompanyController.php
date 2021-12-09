<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class CompanyController extends Controller
{
    /**
     * Display a listing of the companies table.
     *
     * @return View
     */
    public function index():View
    {
        $user = auth()->user();
        $companiesList = $user->companies()->orderBy('id', 'desc')->paginate(10);
      //  $companiesList->find(request()->only('id'));
        return view('companies.index', compact('companiesList'));
    }

    /**
     * Show the form for creating a new company.
     *
     * @return View
     */
    public function create():View
    {
        $company = new Company();
        return view('companies.create', compact('company'));
    }

    /**
     * Store a newly created company in companies table.
     *
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request):RedirectResponse
    {
        $request->validate([
            'name'      => 'required',
            'address'   => 'required',
            'email'     => 'required|email',
            'website'   => 'required'
        ]);
        $request->user()->companies()->create($request->all());
        return redirect()->route('companies.index')->with('message', 'Company has been added successfully');
    }

    /**
     * Display the specified company.
     *
     * @param  Company  $company
     * @return View
     */
    public function show(Company $company): View
    {
        return view('companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified company.
     *
     * @param  Company  $company
     * @return View
     */
    public function edit(Company $company):View
    {
        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified company in companies table.
     *
     * @param  Request  $request
     * @param  Company  $company
     * @return RedirectResponse
     */
    public function update(Request $request, Company $company):RedirectResponse
    {
        $request->validate([
            'address'   => 'required',
            'email'     => 'required|email',
            'website'   => 'required'
        ]);
        $company->update($request->all());
        return redirect()->route('companies.index')->with('message', 'Company has been updated successfully');
    }

    /**
     * Remove the specified company from companies table.
     *
     * @param  Company  $company
     * @return RedirectResponse
     */
    public function destroy(Company $company):RedirectResponse
    {
        $company->delete();
        return redirect()->route('companies.index')->with('message', 'Contact' . " " . $company->id . " " .
            'has been deleted successfully');
    }
}
