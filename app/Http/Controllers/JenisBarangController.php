<?php

namespace App\Http\Controllers;

use App\JenisBarang;
use Illuminate\Http\Request;

class JenisBarangController extends Controller
{
    private $folder = 'jenisbarang';
    private $rules = [
        'jenis' => 'required' //|unique:jenisbarang
    ];

    public function index()
    {
      $data = JenisBarang::all();
      return view($this->folder.'.index',compact('data'));
    }

    public function create()
    {
        return view($this->folder.'.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,$this->rules);
        $data = new JenisBarang;
        $data->jenis = $request->jenis;
        $data->save();
        notify()->flash('Create Success !', 'success', [
            'timer' => 3000,
        ]);
        return redirect($this->folder);
    }

    public function show(JenisBarang $jenisBarang)
    {
        //
    }

    public function edit(JenisBarang $jenisBarang,$id)
    {
      // return $jenisBarang
      // dd($id);
      $data = JenisBarang::findOrFail($id);
      return view($this->folder.'.edit',compact('data'));
    }

    public function update(Request $request, JenisBarang $jenisBarang,$id)
    {
      // dd($jenisBarang->all());
      $this->validate($request,$this->rules);
      $data = JenisBarang::findOrFail($id);
      $data->jenis = $request->jenis;
      $data->save();
      notify()->flash('Update Success !', 'success', [
          'timer' => 3000,
      ]);
      return redirect($this->folder);
    }

    public function destroy(JenisBarang $jenisBarang,$id)
    {
      JenisBarang::FindOrFail($id)->delete();
      notify()->flash('Delete Success !', 'success', [
          'timer' => 3000,
      ]);
      return redirect($this->folder);
    }
}
