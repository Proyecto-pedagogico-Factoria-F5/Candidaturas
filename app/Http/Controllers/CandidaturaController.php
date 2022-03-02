<?php

namespace App\Http\Controllers;

use App\Models\Candidatura;
use App\Http\Requests\StoreCandidaturaRequest;
use App\Http\Requests\UpdateCandidaturaRequest;

class CandidaturaController extends Controller
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCandidaturaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCandidaturaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Candidatura  $candidatura
     * @return \Illuminate\Http\Response
     */
    public function show(Candidatura $candidatura)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Candidatura  $candidatura
     * @return \Illuminate\Http\Response
     */
    public function edit(Candidatura $candidatura)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCandidaturaRequest  $request
     * @param  \App\Models\Candidatura  $candidatura
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCandidaturaRequest $request, Candidatura $candidatura)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Candidatura  $candidatura
     * @return \Illuminate\Http\Response
     */
    public function destroy(Candidatura $candidatura)
    {
        //
    }
}
