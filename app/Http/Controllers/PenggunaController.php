<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\LevelPengguna;

class PenggunaController extends Controller
{
    private $folder = 'pengguna';
    private $rules = [
      'name' => 'required|string|max:255',
      'email' => 'required|string|email|max:255|unique:users',
      'password' => 'required|string|min:6|confirmed',
      'username' => 'required|string|max:255|unique:users',
      'users_level_id' => 'required'
    ];

    private $rules_upadate = [
      'name' => 'required|string|max:255',
      // 'email' => 'required|string|email|max:255|unique:users',
      // 'password' => 'required|string|min:6|confirmed',
      'username' => 'required|string|max:255',
      'users_level_id' => 'required'
    ];

    public function index()
    {
      $data = User::all();
      return view($this->folder.'.index',compact('data'));
    }

    public function create()
    {
      $list_users_level = LevelPengguna::all();
      return view($this->folder.'.create',compact('list_users_level'));
    }

    public function store(Request $request)
    {
      $this->validate($request,$this->rules);
      $data = new User;
      $data->username = $request->username;
      $data->name = $request->name;
      $data->email = $request->email;
      $data->users_level_id = $request->users_level_id;
      $data->password = bcrypt($request->password);
      $data->save();
      notify()->flash('Create Success !', 'success', [
          'timer' => 3000,
      ]);
      return redirect($this->folder);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
      $data = User::findOrFail($id);
      $list_users_level = LevelPengguna::all();
      return view($this->folder.'.edit',compact('data','list_users_level'));
    }

    public function update(Request $request, $id)
    {
      $this->validate($request,$this->rules_upadate);
      $data = User::findOrFail($id);
      $data->username = $request->username;
      $data->name = $request->name;
      $data->users_level_id = $request->users_level_id;
      if(!empty($request->password))
      {
        $data->password = bcrypt($request->password);
      }

      $data->save();
      notify()->flash('Update Success !', 'success', [
          'timer' => 3000,
      ]);
      return redirect($this->folder);
    }

    public function destroy($id)
    {
      User::FindOrFail($id)->delete();
      notify()->flash('Delete Success !', 'success', [
          'timer' => 3000,
      ]);
      return redirect($this->folder);
    }
}
