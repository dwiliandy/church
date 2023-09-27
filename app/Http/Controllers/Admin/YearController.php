<?php

namespace App\Http\Controllers\Admin;

use App\Models\Year;
use App\Models\Income;
use App\Models\IncomeYear;
use App\Models\Expenditure;
use Illuminate\Http\Request;
use App\Models\ExpenditureYear;
use App\Http\Controllers\Controller;

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
      return true;
    }
}
