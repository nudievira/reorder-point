<?php

namespace App\Http\Controllers;

use App\ROP;
use Illuminate\Http\Request;
use App\Barang;
use Auth;

class ROPController extends Controller
{
    private $folder = 'rop';
    private $rules = [
        'm_barang_id' => 'required|unique:m_rop',
        'daily' => 'required',
        'delivery_leadtime' => 'required'
    ];

    private $rules_update = [
        'm_barang_id' => 'required',
        'daily' => 'required',
        'delivery_leadtime' => 'required'
    ];
    public function index()
    {
      $data = ROP::all();
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
      $data = new ROP;
      $data->m_barang_id = $request->m_barang_id;
      $data->daily = $request->daily;
      $data->delivery_leadtime = $request->delivery_leadtime;
      $data->users_id = Auth::user()->id;
      $data->save();
      notify()->flash('Create Success !', 'success', [
          'timer' => 3000,
      ]);
      return redirect($this->folder);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ROP  $rOP
     * @return \Illuminate\Http\Response
     */
    public function show(ROP $rOP)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ROP  $rOP
     * @return \Illuminate\Http\Response
     */
    public function edit(ROP $rOP, $id)
    {
      $data = ROP::findOrFail($id);
      $list_barang = Barang::all();
      return view($this->folder.'.edit',compact('list_barang','data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ROP  $rOP
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ROP $rOP, $id)
    {
      $this->validate($request,$this->rules_update);
      $data = ROP::findOrFail($id);
      $data->m_barang_id = $request->m_barang_id;
      $data->daily = $request->daily;
      $data->delivery_leadtime = $request->delivery_leadtime;
      $data->users_id = Auth::user()->id;
      $data->save();
      notify()->flash('Create Success !', 'success', [
          'timer' => 3000,
      ]);
      return redirect($this->folder);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ROP  $rOP
     * @return \Illuminate\Http\Response
     */
    public function destroy(ROP $rOP, $id)
    {
      ROP::FindOrFail($id)->delete();
      notify()->flash('Delete Success !', 'success', [
          'timer' => 3000,
      ]);
      return redirect($this->folder);
    }
}
