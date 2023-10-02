<?php

namespace App\Http\Controllers\Admin;

use App\Models\Year;
use App\Models\Income;
use App\Models\IncomeYear;
use App\Models\Expenditure;
use Illuminate\Http\Request;
use App\Models\ExpenditureYear;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class YearController extends Controller
{
    public function index(){
      $years = Year::count();
      $this_year = date('Y', strtotime('-5 years'));
      $year_data = [];
      for($i = 1; $i <= 10; $i++){
        array_push($year_data, date('Y', strtotime('01-01-'.$this_year.'+'.$i.'years')));
      }
      return view('backend.year.index', compact('years', 'year_data'));
    }

    public function store(Request $request){
      if($request->name != NULL){
        $year = Year::create(['name' => $request->name]);
      }else{
        $last_year = Year::latest()->first()->name;
        $year = Year::create(['name' => date('Y', strtotime('01-01-'.$last_year.'+1 years'))]);
      }

      foreach(Income::where('status', 1)->get() as $income){
        IncomeYear::create([
          'income_id' => $income->id,
          'year_id' => $year->id,
          'target' => 0
        ]);
      }

      foreach(Expenditure::where('status', 1)->get() as $expenditure){
        ExpenditureYear::create([
          'expenditure_id' => $expenditure->id,
          'year_id' => $year->id,
          'target' => 0
        ]);
      }
      return Response::json(['success' => 'Data Tahun Berhasil Dibuat'],201);
    }

    // Years Income
    public function getIncomes($id){
      $year = Year::where('id', base64_decode($id))->first();
      return view('backend.year.getIncome', compact('year'));
    }

    public function updateIncomes(Request $request){
      foreach($request['data'] as $key => $data){
        $data = str_replace(".","",$data);
        IncomeYear::where('id', base64_decode($key))->update(['target' => $data]);
      }
      return Response::json(['success' => 'Data Pemasukkan Tahun Berhasil Diubah'],200);
    }

    // Years Expenditure
    public function getExpenditures($id){
      $year = Year::where('id', base64_decode($id))->first();
      return view('backend.year.getExpenditure', compact('year'));
    }

    public function updateExpenditures(Request $request){
      foreach($request['data'] as $key => $data){
        $data = str_replace(".","",$data);
        ExpenditureYear::where('id', base64_decode($key))->update(['target' => $data]);
      }
      return Response::json(['success' => 'Data Pengeluaran Tahun Berhasil Diubah'],200);
    }
}
