<?php

namespace App\Http\Controllers;

use App\SaftyStock;
use Illuminate\Http\Request;
use App\Barang;
use Auth;

class SaftyStockController extends Controller
{
    private $folder = 'saftystock';
    private $rules = [
        'm_barang_id' => 'required|unique:m_safty_stock',
        'max' => 'required',
        'rerata' => 'required',
        'leadtime' => 'required'
    ];

    private $rules_update = [
        'm_barang_id' => 'required',
        'max' => 'required',
        'rerata' => 'required',
        'leadtime' => 'required'
    ];

    public function index()
    {
      $data = SaftyStock::all();
      return view($this->folder.'.index',compact('data'));
    }

    public function create()
    {
      $list_barang = Barang::all();
      return view($this->folder.'.create',compact('list_barang'));
    }

    public function store(Request $request)
    {
      $this->validate($request,$this->rules);
      $data = new SaftyStock;
      $data->m_barang_id = $request->m_barang_id;
      $data->max = $request->max;
      $data->rerata = $request->rerata;
      $data->leadtime = $request->leadtime;
      $data->users_id = Auth::user()->id;
      $data->save();
      notify()->flash('Create Success !', 'success', [
          'timer' => 3000,
      ]);
      return redirect($this->folder);
    }


    public function show(SaftyStock $saftyStock)
    {
        //
    }


    public function edit($id)
    {
      $data = SaftyStock::findOrFail($id);
      $list_barang = Barang::all();
      return view($this->folder.'.edit',compact('list_barang','data'));
    }

    public function update(Request $request, $id)
    {
      $this->validate($request,$this->rules_update);
      $data = SaftyStock::findOrFail($id);
      $data->m_barang_id = $request->m_barang_id;
      $data->max = $request->max;
      $data->rerata = $request->rerata;
      $data->leadtime = $request->leadtime;
      $data->users_id = Auth::user()->id;
      $data->save();
      notify()->flash('Update Success !', 'success', [
          'timer' => 3000,
      ]);
      return redirect($this->folder);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SaftyStock  $saftyStock
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      SaftyStock::FindOrFail($id)->delete();
      notify()->flash('Delete Success !', 'success', [
          'timer' => 3000,
      ]);
      return redirect($this->folder);
    }
}
