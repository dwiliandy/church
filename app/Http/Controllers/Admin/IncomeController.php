<?php

namespace App\Http\Controllers\Admin;

use App\Models\Income;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class IncomeController extends Controller
{
    public function index(){
      return view('backend.income.index');
    }

    public function store(Request $request){
      $validator = Validator::make($request->all(), [
        'unique_id' => ['required', 'string', 'max:10','unique:incomes'],
        'name' => ['required', 'string', 'max:255']
      ], array(
          'unique_id.unique' => 'Kode Unik Sudah Ada',
          'unique_id.required' => 'Kode Unik Harus Diisi',
          'unique_id.max' => 'Kode Unik Lebih dari 10 Karakter',
          'name.required' => 'Nama Pemasukkan Harus Diisi',
        ) 
      );

      if($validator->passes()){
        Income::create([
          'unique_id' => $request->unique_id,
          'name' => $request->name
        ]);
        return Response::json(['success' => '1'],201);
      }
      return Response::json(['errors' => $validator->errors()],422);
    }
}
