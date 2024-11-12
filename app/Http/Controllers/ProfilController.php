<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
class ProfilController extends Controller
{
  private $rules = [
      'name' => 'required',
      'username' => 'required'
  ];
  private $rules_password = [
      'password' => 'required|string|min:6|confirmed'
  ];
  private $rules_picture = [
      'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024'
  ];

  public function index()
  {
    $id = Auth::user()->id;
    $data = User::findOrFail($id);
    return view('profil.index',compact('data'));
  }

  public function updateprofil(Request $request)
  {
    // dd($request->all());
    $this->validate($request,$this->rules);
    $id = Auth::user()->id;
    $data = User::findOrFail($id);
    $data->name = $request->name;
    $data->username = $request->username;
    $data->save();
    notify()->flash('Update Profil Success !', 'success', [
        'timer' => 3000,
    ]);
    return redirect('profil');
  }

  public function updatepassword(Request $request)
  {
    // dd($request->all());
    $this->validate($request,$this->rules_password);
    $id = Auth::user()->id;
    $data = User::findOrFail($id);
    $data->password = bcrypt($request->password);
    $data->save();
    notify()->flash('Update Password Success !', 'success', [
        'timer' => 3000,
    ]);
    return redirect('profil');
  }

  public function updatepicture(Request $request)
  {
    // dd($request->all());
    $this->validate($request,$this->rules_picture);
    $id = Auth::user()->id;

    $extension = $request->file('picture')->getClientOriginalExtension();
    $namafile = $id.'.'.$extension;

    $data = User::findOrFail($id);
    $data->picture = $namafile;
    $data->save();

    $request->file('picture')->move(
      base_path() . '/public/pictures/', $namafile
    );

    notify()->flash('Update Password Success !', 'success', [
        'timer' => 3000,
    ]);
    return redirect('profil');
  }
}
