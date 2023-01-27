<?php

namespace App\Http\Controllers\Admin;

use App\Models\GroupData;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GroupController extends Controller
{
    //
    public function index(){
      return \view('backend.group.index');
    }

    public function store(Request $request){
      $request->validate([
        'total' => 'required',
        'type' => 'required'
      ],
      [
          'total.required' => 'Jumlah data harus diisi',
          'type.required' => 'Aksi harus diisi'
      ]);

      if($request->type == 'remove'){
        if (GroupData::all()->count() < $request->total){
          return response()->json(['error' => 'Jumlah Kolom lebih kecil dari total kolom yang ingin dihapus'],422);
        }
        for($i = 0; $i < $request->total; $i++){
          GroupData::query()->orderBy('id','desc')->first()->delete();
        }
        return response()->json(['success' => 'delete'],201);
      }else{
        for($i = 0; $i < $request->total; $i++){
          GroupData::create(['name' => GroupData::count() + 1]);
        }
        return response()->json(['success' => 'added'],201);
      }
    }
}
