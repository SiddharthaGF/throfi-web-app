<?php

namespace App\Http\Controllers\Api\v1\DPA;

use App\Http\Controllers\Controller;
use App\Imports\ParishImport;
use App\Models\Parish;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ParishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Parish::Paginate();
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Parish  $parish
     * @return \Illuminate\Http\Response
     */
    public function show(Parish $parish)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Parish  $parish
     * @return \Illuminate\Http\Response
     */
    public function edit(Parish $parish)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Parish  $parish
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Parish $parish)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Parish  $parish
     * @return \Illuminate\Http\Response
     */
    public function destroy(Parish $parish)
    {
        //
    }

    /**
     * Import the specified resource from storage.
     *
     * @param  \App\Models\Parish  $parish
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new ParishImport, $file);
        return back()->with('message', 'Importacion correcta');
    }

}