<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\FlareClient\Http\Response;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index(){
      return \view('backend.user.index');
    }

    public function store(Request $request){
      $validatedData = $request->validate([
        'name' => 'required',
        'email' => 'required|string|max:255|unique:users',
        'username' => 'required|string|max:255|unique:users',
        'password' => 'required|string|min:6|confirmed',
        'password_confirmation' => 'required',
      ],
      [
          'name.required' => 'Nama harus diisi',
          'email.required' => 'Email harus diisi',
          'email.unique' => 'Email tidak boleh sama',
          'email.required' => 'Username harus diisi',
          'email.unique' => 'Username tidak boleh sama',
          'password.required' => 'Kata Sandi baru harus diisi',
          'password.confirmed' => 'Konfirmasi kata sandi tidak cocok',
          'password.min' => 'Kata Sandi minimal 6 karakter'
      ]);
      $user = User::create([
        'name' => $request->name,
        'username' => $request->username,
        'email' => $request->email,
        'password' => bcrypt($request->password)
      ]);
      return response()->json(['success' => 'Pengguna baru berhasil dibuat'],201);

    }
}
