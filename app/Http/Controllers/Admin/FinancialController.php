<?php

namespace App\Http\Controllers\Admin;

use App\Models\Year;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FinancialController extends Controller
{
    public function index($year){
      $year_name = Year::where('id', base64_decode($year))->first()->name;
      return view('backend.financial.index', compact('year', 'year_name'));
    }
}
