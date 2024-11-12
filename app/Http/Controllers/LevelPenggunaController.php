<?php

namespace App\Http\Controllers;

use App\LevelPengguna;
use Illuminate\Http\Request;

class LevelPenggunaController extends Controller
{
    private $folder = 'levelpengguna';
    private $rules = [
        'level' => 'required' //|unique:jenisbarang
    ];

    public function index()
    {
      $data = LevelPengguna::all();
      return view($this->folder.'.index',compact('data'));
    }

    public function create()
    {
        return view($this->folder.'.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,$this->rules);
        $data = new LevelPengguna;
        $data->level = $request->level;
        $data->save();
        notify()->flash('Create Success !', 'success', [
            'timer' => 3000,
        ]);
        return redirect($this->folder);
    }


    public function edit($id)
    {
      // return $jenisBarang
      // dd($id);
      $data = LevelPengguna::findOrFail($id);
      return view($this->folder.'.edit',compact('data'));
    }

    public function update(Request $request, $id)
    {
      // dd($jenisBarang->all());
      $this->validate($request,$this->rules);
      $data = LevelPengguna::findOrFail($id);
      $data->level = $request->level;
      $data->save();
      notify()->flash('Update Success !', 'success', [
          'timer' => 3000,
      ]);
      return redirect($this->folder);
    }

    public function destroy($id)
    {
      LevelPengguna::FindOrFail($id)->delete();
      notify()->flash('Delete Success !', 'success', [
          'timer' => 3000,
      ]);
      return redirect($this->folder);
    }
}
