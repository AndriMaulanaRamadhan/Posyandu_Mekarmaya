<?php

namespace App\Http\Controllers;

use App\DataPenduduk;
use Illuminate\Http\Request;

class DataPendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
public function index(Request $request)
{
    $sort = $request->get('sort', 'asc');

    if (!in_array($sort, ['asc', 'desc'])) {
        $sort = 'asc';
    }

    $dataPenduduk = DataPenduduk::orderBy('nama', $sort)
        ->paginate(5)
        ->appends(['sort' => $sort]);

    return view('view_penduduk', compact('dataPenduduk', 'sort'));
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tambah_penduduk');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
        ]);

        DataPenduduk::create($request->all());
        return redirect()->route('view_penduduk')->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DataPenduduk  $dataPenduduk
     * @return \Illuminate\Http\Response
     */
    public function show(DataPenduduk $dataPenduduk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DataPenduduk  $dataPenduduk
     * @return \Illuminate\Http\Response
     */
    public function edit(DataPenduduk $dataPenduduk, $id)
    {
        $dataPenduduk = DataPenduduk::findOrFail($id);
        return view('edit_penduduk', compact('dataPenduduk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DataPenduduk  $dataPenduduk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataPenduduk $dataPenduduk, $id)
    {
        $request->validate([
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
        ]);


        $dataPenduduk = DataPenduduk::findOrFail($id);
        $dataPenduduk->update($request->all());

        return redirect()->route('view_penduduk')->with('warning', 'Data berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DataPenduduk  $dataPenduduk
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataPenduduk $dataPenduduk, $id)
     {
        DataPenduduk::destroy($id);
        return redirect()->route('view_penduduk')->with('danger', 'Data berhasil dihapus.');
     }
}
