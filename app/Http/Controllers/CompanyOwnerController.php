<?php

namespace App\Http\Controllers;

use App\Models\CompanyOwner;
use App\Http\Requests\StoreCompanyOwnerRequest;
use App\Http\Requests\UpdateCompanyOwnerRequest;

class CompanyOwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCompanyOwnerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompanyOwnerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CompanyOwner  $companyOwner
     * @return \Illuminate\Http\Response
     */
    public function show(CompanyOwner $companyOwner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCompanyOwnerRequest  $request
     * @param  \App\Models\CompanyOwner  $companyOwner
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompanyOwnerRequest $request, CompanyOwner $companyOwner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CompanyOwner  $companyOwner
     * @return \Illuminate\Http\Response
     */
    public function destroy(CompanyOwner $companyOwner)
    {
        //
    }
}
