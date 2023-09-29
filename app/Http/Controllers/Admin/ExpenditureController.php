<?php

namespace App\Http\Controllers\Admin;

use App\Models\Expenditure;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class ExpenditureController extends Controller
{
    public function index(){
      return view('backend.expenditure.index');
    }

    public function store(Request $request){
      $validator = Validator::make($request->all(), [
        'unique_id' => ['required', 'string', 'max:10', Rule::unique('expenditures')->where(function ($query) use ($request) {
          return $query->where('status', 1);
        })],
        'name' => ['required', 'string', 'max:255']
      ], array(
          'unique_id.unique' => 'Kode Unik Sudah Ada',
          'unique_id.required' => 'Kode Unik Harus Diisi',
          'unique_id.max' => 'Kode Unik Lebih dari 10 Karakter',
          'name.required' => 'Nama Pengeluaran Harus Diisi',
        ) 
      );

      if($validator->passes()){
        Expenditure::create([
          'unique_id' => $request->unique_id,
          'name' => $request->name
        ]);
        return Response::json(['success' => 'Data Pengeluaran Berhasil Dibuat'],201);
      }
      return Response::json(['errors' => $validator->errors()],422);
    }

    public function edit ($id){
      $income = Expenditure::where('id', base64_decode($id))->first();
      $data['unique_id'] = $income->unique_id;
      $data['name'] = $income->name;

      return $data;
    }

    public function update(Request $request, $id){
      $expenditure = Expenditure::where('id', base64_decode($id))->first();
      $validator = Validator::make($request->all(), [
        'unique_id' => ['required', 'string', 'max:10', Rule::unique('expenditures')->ignore($expenditure)->where(function ($query) use ($request) {
          return $query->where('status', 1);
        })],
        'name' => ['required', 'string', 'max:255']
      ], array(
          'unique_id.unique' => 'Kode Unik Sudah Ada',
          'unique_id.required' => 'Kode Unik Harus Diisi',
          'unique_id.max' => 'Kode Unik Lebih dari 10 Karakter',
          'name.required' => 'Nama Pemasukkan Harus Diisi',
        ) 
      );
      if($validator->passes()){
        $expenditure->update([
          'unique_id' => $request->unique_id,
          'name' => $request->name
        ]);
        return Response::json(['success' => 'Data Pengeluaran Berhasil Diubah'],200);
      }
      return Response::json(['errors' => $validator->errors()],422);
    }

    public function destroy($id){
      Expenditure::where('id', base64_decode($id))->update(['status' => 0]);
      return Response::json(['success' => 'Data Pengeluaran Berhasil Dihapus'],200);
    }
}
