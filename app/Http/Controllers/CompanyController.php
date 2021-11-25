<?php

namespace App\Http\Controllers;

use App\Models\Company;
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
        //
    }

    /**
     * Show the form for creating a new company.
     *
     * @return Response
     */
    public function create():Response
    {
        //
    }

    /**
     * Store a newly created company in companies table.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request):Response
    {
        //
    }

    /**
     * Display the specified company.
     *
     * @param  Company  $company
     * @return Response
     */
    public function show(Company $company):Response
    {
        //
    }

    /**
     * Show the form for editing the specified company.
     *
     * @param  Company  $company
     * @return Response
     */
    public function edit(Company $company):Response
    {
        //
    }

    /**
     * Update the specified company in companies table.
     *
     * @param  Request  $request
     * @param  Company  $company
     * @return Response
     */
    public function update(Request $request, Company $company):Response
    {
        //
    }

    /**
     * Remove the specified company from companies table.
     *
     * @param  Company  $company
     * @return Response
     */
    public function destroy(Company $company):Response
    {
        //
    }
}
