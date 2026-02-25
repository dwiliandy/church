<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\DataTables\ApprovalsDataTable;

class ApprovalController extends Controller
{
  public function index(ApprovalsDataTable $dataTable)
  {
    return $dataTable->render('backend.approval.index');
  }
}
