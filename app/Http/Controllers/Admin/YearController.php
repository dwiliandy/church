<?php

namespace App\Http\Controllers\Admin;

use App\Models\Year;
use Illuminate\Http\Request;
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
        Year::create(['name' => $request->name]);
      }else{
        $last_year = Year::latest()->first()->name;
        Year::create(['name' => date('Y', strtotime('01-01-'.$last_year.'+1 years'))]);
      }
      return true;
    }
}
