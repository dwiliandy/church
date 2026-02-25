<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Family;
use App\DataTables\FamiliesDataTable;

class FamilyController extends Controller
{
  public function index(FamiliesDataTable $dataTable)
  {
    return $dataTable->render('backend.family.index');
  }
}
