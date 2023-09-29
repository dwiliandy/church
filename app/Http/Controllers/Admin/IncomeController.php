<?php

namespace App\Http\Controllers\Admin;

use toastr;
use App\Models\Income;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
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
        return Response::json(['success' => 'Data Pemasukkan Berhasil Dibuat'],201);
      }
      return Response::json(['errors' => $validator->errors()],422);
    }

    public function edit ($id){
      $income = Income::where('id', base64_decode($id))->first();
      $data['unique_id'] = $income->unique_id;
      $data['name'] = $income->name;

      return $data;
    }

    public function update(Request $request, $id){
      $income = Income::where('id', base64_decode($id))->first();
      $validator = Validator::make($request->all(), [
        'unique_id' => ['required', 'string', 'max:10',Rule::unique('incomes')->ignore($income)],
        'name' => ['required', 'string', 'max:255']
      ], array(
          'unique_id.unique' => 'Kode Unik Sudah Ada',
          'unique_id.required' => 'Kode Unik Harus Diisi',
          'unique_id.max' => 'Kode Unik Lebih dari 10 Karakter',
          'name.required' => 'Nama Pemasukkan Harus Diisi',
        ) 
      );

      if($validator->passes()){
        $income->update([
          'unique_id' => $request->unique_id,
          'name' => $request->name
        ]);
        toast('Data Pemasukkan Berhasil Diubah!','success','top-right');
        return Response::json(['success' => 'Data Pemasukkan Berhasil Diubah'],200);
      }
      return Response::json(['errors' => $validator->errors()],422);
    }
}
