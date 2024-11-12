<?php

namespace App\Http\Controllers;

use App\Barang;
use Illuminate\Http\Request;
use Auth;
use App\JenisBarang;
use App\SatuanBarang;

class BarangController extends Controller
{
    private $folder = 'barang';
    private $rules = [
        'kode' => 'required|unique:m_barang',
        'nama' => 'required',
        'm_satuan_id'=> 'required',
        'm_jenis_id'=> 'required',
        'harga'=> 'required',
        'stok_awal'=> 'required',
        'gambar'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024'
    ];
    private $rules_update = [
        'kode' => 'required',
        'nama' => 'required',
        'm_satuan_id'=> 'required',
        'm_jenis_id'=> 'required',
        'harga'=> 'required',
        'stok_awal'=> 'required'
    ];

    public function index()
    {
      $data = Barang::get();
      // dd($data);
      return view($this->folder.'.index',compact('data'));
    }

    public function create()
    {
      $list_satuan = SatuanBarang::all();
      $list_jenis = JenisBarang::all();
      // dd($list_satuan);
      return view($this->folder.'.create',compact('list_satuan','list_jenis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // dd($request->all());
      $this->validate($request,$this->rules);

      $extension = $request->file('gambar')->getClientOriginalExtension();
      $namafile = $request->kode.'.'.$extension;

      $data = new Barang;
      $data->kode = $request->kode;
      $data->nama = $request->nama;
      $data->m_satuan_id = $request->m_satuan_id;
      $data->m_jenis_id = $request->m_jenis_id;
      $data->harga = $request->harga;
      $data->stok_awal = $request->stok_awal;
      $data->users_id = Auth::user()->id;
      $data->gambar = $namafile;
      $data->save();

      $request->file('gambar')->move(
        base_path() . '/public/gambar/', $namafile
      );

      notify()->flash('Create Success !', 'success', [
          'timer' => 3000,
      ]);
      return redirect($this->folder);
    }

    public function show(Barang $barang)
    {
        //
    }

    public function edit($id)
    {
      // dd($id);
      $list_satuan = SatuanBarang::all();
      $list_jenis = JenisBarang::all();
      $data = Barang::findOrFail($id);
      return view($this->folder.'.edit',compact('data','list_satuan','list_jenis'));
    }

    public function update(Request $request,$id)
    {
      $this->validate($request,$this->rules_update);
      // dd($request->file('gambar'));

      $data = Barang::findOrFail($id);
      $data->kode = $request->kode;
      $data->nama = $request->nama;
      $data->m_satuan_id = $request->m_satuan_id;
      $data->m_jenis_id = $request->m_jenis_id;
      $data->harga = $request->harga;
      $data->stok_awal = $request->stok_awal;
      $data->users_id = Auth::user()->id;

      if($request->file('gambar'))
      {
        $extension = $request->file('gambar')->getClientOriginalExtension();
        $namafile = $request->kode.'.'.$extension;
        $data->gambar = $namafile;
        $request->file('gambar')->move(
          base_path() . '/public/gambar/', $namafile
        );
      }

      $data->save();
      notify()->flash('Update Success !', 'success', [
          'timer' => 3000,
      ]);
      return redirect($this->folder);
    }

    public function destroy($id)
    {
      Barang::FindOrFail($id)->delete();
      notify()->flash('Delete Success !', 'success', [
          'timer' => 3000,
      ]);
      return redirect($this->folder);
    }
}
