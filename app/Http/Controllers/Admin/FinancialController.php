<?php

namespace App\Http\Controllers\Admin;

use App\Models\Year;
use App\Models\Financial;
use App\Models\IncomeYear;
use Illuminate\Http\Request;
use App\Models\ExpenditureYear;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class FinancialController extends Controller
{
    public function index($year){
      $year_name = Year::where('id', base64_decode($year))->first()->name;
      return view('backend.financial.index', compact('year', 'year_name'));
    }

    public function store(Request $request){
      $validator = Validator::make($request->all(), [
        'type' => ['required'],
        'date' => ['required'],
      ], array(
          'type.required' => 'Data Tipe Harus Diisi',
          'date.required' => 'Tanggal Transaksi Harus Diisi',
        ) 
      );

      if($validator->passes()){
        $validator = Validator::make($request->all(), [
          'finance_data' => ['required'],
          'total_data' => ['required'],
        ], array(
            'finance_data.required' => 'Data Pemasukkan/Pengeluaran Harus Diisi',
            'total_data.required' => 'Jumlah Nominal Harus Diisi',
          ) 
        );
        if($validator->passes()){
          if($request->type == 'Pemasukkan'){
            Financial::create([
              'date' => $request->date,
              'description' => $request->description,
              'type' => 'Pemasukkan',
              'total_income' => str_replace(".","",$request->total_data),
              'status' => 'Diterima',
              'income_year_id' => base64_decode($request->finance_data),
              'action_user' => Auth::user()->id
            ]);
          }else{
            Financial::create([
              'date' => $request->date,
              'description' => $request->description,
              'type' => 'Pengeluaran',
              'total_expenditure' => str_replace(".","",$request->total_data),
              'status' => 'Diterima',
              'expenditure_year_id' => base64_decode($request->finance_data),
              'action_user' => Auth::user()->id
            ]);
          }
          return Response::json(['success' => 'Data Transaksi Berhasil Dibuat'],201);
        }
        return Response::json(['errors' => $validator->errors()],422);
      }
      return Response::json(['errors' => $validator->errors()],422);
    }


    public function getFinance($data, $year){
      if($data == 'Pemasukkan'){
        $select_data = IncomeYear::leftJoin('incomes','incomes.id','=','income_years.income_id')
                                 ->where('year_id', base64_decode($year))
                                 ->select('income_years.id as id','incomes.unique_id as unique_id','incomes.name as name')
                                 ->get();
      }else{
        $select_data = ExpenditureYear::leftJoin('expenditures','expenditures.id','=','expenditure_years.expenditure_id')
                                      ->where('year_id', base64_decode($year))
                                      ->select('expenditure_years.id as id','expenditures.unique_id as unique_id','expenditures.name as name')
                                      ->get();
      }
      $string = '';
      $string .= '<div class="col-12">';
        $string .= '<label for="finance_data" class="form-label">Data '.$data.'<span class="required"> *</span></label>';
        $string .= '<select class="custom-select" name="finance_data" id="finance_data">';
          $string .= '<option disabled selected>--Pilih--</option>';
          foreach($select_data as $select){
            $string .= '<option value="'.base64_encode($select->id).'">('.$select->unique_id.') '.$select->name.'</option>';
          }
        $string .= '</select>';
        $string .= '<span id="finance_data_create" class="error-validation"></span>';
      $string .= '</div>';
      $string .= '<div class="col-12">';
        $string .= '<label for="description" class="form-label">Deskripsi</label>';
        $string .= ' <textarea class="form-control" name="description"  id="description" rows="3"></textarea>';
      $string .= '</div>';
      $string .= '<div class="col-12">';
        $string .= '<label for="total_data" class="form-label">Jumlah <span class="required"> *</span></label>';
        $string .= '<input type="text" name="total_data" class="form-control amount" id="total_data">';
        $string .= '<span id="totalCreate" class="error-validation"></span>';
      $string .= '</div>';
      
      return $string;
    }
}
