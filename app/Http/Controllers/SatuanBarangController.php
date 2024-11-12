<?php

namespace App\Http\Controllers;

use App\SatuanBarang;
use Illuminate\Http\Request;

class SatuanBarangController extends Controller
{
    private $folder = 'satuanbarang';
    private $rules = [
        'satuan' => 'required' //|unique:jenisbarang
    ];
    public function index()
    {
      $data = SatuanBarang::all();
      return view($this->folder.'.index',compact('data'));
    }

    public function create()
    {
      return view($this->folder.'.create');
    }

    public function store(Request $request)
    {
      $this->validate($request,$this->rules);
      $data = new SatuanBarang;
      $data->satuan = $request->satuan;
      $data->save();
      notify()->flash('Create Success !', 'success', [
          'timer' => 3000,
      ]);
      return redirect($this->folder);
    }

    public function show(SatuanBarang $satuanBarang)
    {
        //
    }

    public function edit(SatuanBarang $satuanBarang,$id)
    {
      $data = SatuanBarang::findOrFail($id);
      return view($this->folder.'.edit',compact('data'));
    }

    public function update(Request $request, SatuanBarang $satuanBarang,$id)
    {
      $this->validate($request,$this->rules);
      $data = SatuanBarang::findOrFail($id);
      $data->satuan = $request->satuan;
      $data->save();
      notify()->flash('Update Success !', 'success', [
          'timer' => 3000,
      ]);
      return redirect($this->folder);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SatuanBarang  $satuanBarang
     * @return \Illuminate\Http\Response
     */
    public function destroy(SatuanBarang $satuanBarang,$id)
    {
      SatuanBarang::FindOrFail($id)->delete();
      notify()->flash('Delete Success !', 'success', [
          'timer' => 3000,
      ]);
      return redirect($this->folder);
    }
}
