<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class ResetPasswordController extends Controller
{
  private $folder = 'resetpassword';
  // private $rules = [
  //   'password' => 'required|string|min:6|confirmed'
  // ];
  public function index()
  {
    $data = User::all();
    return view($this->folder.'.index',compact('data'));
  }

  public function reset(Request $request, $id)
  {
    // dd($id);
    // $this->validate($request,$this->rules);
    $data = User::findOrFail($id);
    $data->password = bcrypt('123456');
    $data->save();
    notify()->flash('Reset Password Success !', 'success', [
        'timer' => 3000,
    ]);
    return redirect($this->folder);
  }
}
