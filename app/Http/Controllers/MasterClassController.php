<?php

namespace App\Http\Controllers;

use App\Models\MasterClass;
use Illuminate\Http\Request;

use function PHPSTORM_META\map;

class MasterClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.master_class.index', [
            'title' => 'Data Kelas',
            'data' => MasterClass::paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.master_class.form', [
            'title' => 'Tambah Kelas',
            'data' => new MasterClass,
            'method' => 'POST',
            'action' => route('master_classes.store'),
            'submit' => 'Simpan'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form = $request->validate([
            'name' => 'required|string',
            'wali_name' => 'required|string',
        ]);
        MasterClass::create($form);
        return redirect()->route('master_classes.index')->with('success', 'Kelas berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MasterClass  $masterClass
     * @return \Illuminate\Http\Response
     */
    public function show(MasterClass $masterClass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MasterClass  $masterClass
     * @return \Illuminate\Http\Response
     */
    public function edit(MasterClass $masterClass)
    {
        return view('pages.master_class.form', [
            'title' => 'Edit Kelas',
            'data' => $masterClass,
            'action' => route('master_classes.update', $masterClass),
            'method' => 'PUT',
            'submit' => 'Update'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MasterClass  $masterClass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MasterClass $masterClass)
    {
        $form = $request->validate([
            'name' => 'required|string',
            'wali_name' => 'required|string',
        ]);
        $masterClass->update($form);
        return redirect()->route('master_classes.index')->with('success', 'Kelas berhasil diperbaharui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MasterClass  $masterClass
     * @return \Illuminate\Http\Response
     */
    public function destroy(MasterClass $masterClass)
    {
        $masterClass->delete();
        return redirect()->route('master_classes.index')->with('success', 'Kelas berhasil dihapus!');
    }
}
