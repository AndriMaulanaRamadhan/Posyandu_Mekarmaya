<?php

namespace App\Http\Controllers;

use App\DataOrangtua;
use Illuminate\Http\Request;

class DataOrangtuaController extends Controller
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
     * @param  \App\DataOrangtua  $dataOrangtua
     * @return \Illuminate\Http\Response
     */
    public function show(DataOrangtua $dataOrangtua)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DataOrangtua  $dataOrangtua
     * @return \Illuminate\Http\Response
     */
    public function edit(DataOrangtua $dataOrangtua)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DataOrangtua  $dataOrangtua
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataOrangtua $dataOrangtua)
    {
        $request->validate([
            'nama_ayah' => 'required|string|max:255',
            'nama_ibu' => 'required|string|max:255',
            'no_kk' => 'nullable|string|max:255',
            'nik_ayah' => 'required|string|max:255|unique:data_orangtuas,nik_ayah,' . $dataOrangtua->id,
            'nik_ibu' => 'required|string|max:255|unique:data_orangtuas,nik_ibu,' . $dataOrangtua->id,
            'pekerjaan_ayah' => 'nullable|string|max:255',
            'pekerjaan_ibu' => 'nullable|string|max:255',
            'status_kategori' => 'nullable|in:wus,pus,lansia',
            'status_kondisi' => 'required|in:hamil,tidak',
            'alamat' => 'nullable|string|max:255',
            'foto_kk' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DataOrangtua  $dataOrangtua
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataOrangtua $dataOrangtua)
    {
        //
    }
}
