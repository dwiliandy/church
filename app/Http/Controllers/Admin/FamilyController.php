<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FamilyController extends Controller
{
    public function index(){
      return \view('backend.family.index');
    }
}
