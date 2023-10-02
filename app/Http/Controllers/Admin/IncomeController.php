<?php

namespace App\Http\Controllers\Admin;

use App\Models\Year;
use App\Models\Income;
use App\Models\IncomeYear;
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
        'unique_id' => ['required', 'string', 'max:10', Rule::unique('incomes')->where(function ($query) use ($request) {
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
        $income = Income::create([
          'unique_id' => $request->unique_id,
          'name' => $request->name
        ]);

        $years = Year::where('name', '>=', date('Y'))->get();
        foreach ($years as $year){
          IncomeYear::create([
            'income_id' => $income->id,
            'year_id' => $year->id,
            'target' => 0
          ]);
        }
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
        'unique_id' => ['required', 'string', 'max:10', Rule::unique('incomes')->ignore($income)->where(function ($query) use ($request) {
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
        $income->update([
          'unique_id' => $request->unique_id,
          'name' => $request->name
        ]);
        return Response::json(['success' => 'Data Pemasukkan Berhasil Diubah'],200);
      }
      return Response::json(['errors' => $validator->errors()],422);
    }

    public function destroy($id){
      Income::where('id', base64_decode($id))->update(['status' => 0]);
      return Response::json(['success' => 'Data Pemasukkan Berhasil Dihapus'],200);
    }
}
