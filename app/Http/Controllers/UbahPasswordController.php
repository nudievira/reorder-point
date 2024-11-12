<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class UbahPasswordController extends Controller
{
  private $folder = 'ubahpassword';
  private $rules = [
    'password' => 'required|string|min:6|confirmed'
  ];
  public function index()
  {
    $id = Auth::user()->id;
    $data = User::findOrFail($id);
    return view($this->folder.'.index',compact('data'));
  }

  public function update(Request $request, $id)
  {
    // dd($id);
    $this->validate($request,$this->rules);
    $data = User::findOrFail($id);
    $data->password = bcrypt($request->password);
    $data->save();
    notify()->flash('Update Success !', 'success', [
        'timer' => 3000,
    ]);
    return redirect($this->folder);
  }
}
