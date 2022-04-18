<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\Promo;
use App\Models\Token;

use App\Http\Requests\StorePromoRequest;
use App\Http\Requests\UpdatePromoRequest;

class PromoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $promos = Promo::with('school')->get();
        $school = [];
        return view('promos-view', compact('school', 'promos'));
    }

    public function getPromosSchool($id)
    {
        $school = School::where('id', $id)->get();
        return view('promos-view', compact('school'));
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
     * @param  \App\Http\Requests\StorePromoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePromoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Promo  $promo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Promo::findOrFail($id);
        $token = Token::findOrFail(1);

        return view('candidaturas-view', compact('data','token'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Promo  $promo
     * @return \Illuminate\Http\Response
     */
    public function edit(Promo $promo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePromoRequest  $request
     * @param  \App\Models\Promo  $promo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePromoRequest $request, Promo $promo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Promo  $promos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Promo $promo)
    {
        //
    }
}
