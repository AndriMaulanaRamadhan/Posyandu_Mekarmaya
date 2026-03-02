<?php

namespace App\Http\Controllers;

use App\DataAnak;
use Illuminate\Http\Request;

class DataAnakController extends Controller
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
     * @param  \App\DataAnak  $dataAnak
     * @return \Illuminate\Http\Response
     */
    public function show(DataAnak $dataAnak)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DataAnak  $dataAnak
     * @return \Illuminate\Http\Response
     */
    public function edit(DataAnak $dataAnak)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DataAnak  $dataAnak
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataAnak $dataAnak)
    {
        $request->validate([
            'orangtua_id' => 'required|exists:data_orangtuas,id',
            'nama_anak' => 'required',
            'tanggal_lahir' => 'required|date',
            'nik' => 'required|unique:data_anaks,nik,' . $dataAnak->id,
            'jenis_kelamin' => 'required|in:L,P',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DataAnak  $dataAnak
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataAnak $dataAnak)
    {
        //
    }
}
