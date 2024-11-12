<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    private $folder = 'supplier';
    private $rules = [
        'kode' => 'required', //|unique:jenisbarang
        'nama' => 'required',
        'hp' => 'required'
    ];

    public function index()
    {
      $data = Supplier::all();
      return view($this->folder.'.index',compact('data'));
    }

    public function create()
    {
      return view($this->folder.'.create');
    }


    public function store(Request $request)
    {
      $this->validate($request,$this->rules);
      $data = new Supplier;
      $data->kode = $request->kode;
      $data->nama = $request->nama;
      $data->alamat = $request->alamat;
      $data->hp = $request->hp;
      $data->save();
      notify()->flash('Create Success !', 'success', [
          'timer' => 3000,
      ]);
      return redirect($this->folder);
    }

    public function show(Supplier $supplier)
    {
        //
    }

    public function edit($id)
    {
      $data = Supplier::findOrFail($id);
      return view($this->folder.'.edit',compact('data'));
    }


    public function update(Request $request, $id)
    {
      $this->validate($request,$this->rules);
      $data = Supplier::findOrFail($id);
      $data->kode = $request->kode;
      $data->nama = $request->nama;
      $data->alamat = $request->alamat;
      $data->hp = $request->hp;
      $data->save();
      notify()->flash('Update Success !', 'success', [
          'timer' => 3000,
      ]);
      return redirect($this->folder);
    }

    public function destroy($id)
    {
      Supplier::FindOrFail($id)->delete();
      notify()->flash('Delete Success !', 'success', [
          'timer' => 3000,
      ]);
      return redirect($this->folder);
    }
}
